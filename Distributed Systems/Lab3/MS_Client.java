/*Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Random;
import java.util.stream.Collectors;

/*
 * class for MS_Client starts below
 * Reference:- https://www.dreamincode.net/forums/topic/259777-a-simple-chat-program-with-clientserver-gui-optional/ 
 * (Base code)
 */
public class MS_Client {
	// Initialize variable to read and write in the socket
	private ObjectInputStream in;
	private ObjectOutputStream out;
	// Initialize the socket
	private Socket socket;
	// ClientGUI object
	private MS_ClientGUI cg;
	// Initialize array list dup
	public ArrayList<String> dup = new ArrayList<String>();
	// Initialise the strings server and username
	private String server, username;
	int updatedClientClock;
	private List<Integer> sendIds;
	VectorClock clientClock;
	protected boolean startRandom;
	private int client_id;

	/*
	 * Getters and Setters for getting the username of the clients
	 */
	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	/*
	 * Client Constructor with parameters inputs: server, username, client GUI
	 * instance outputs: None
	 */
	MS_Client(String server, String username, MS_ClientGUI cg) {
		this.server = server;
		this.username = username;
		this.cg = cg;
		this.clientClock = new VectorClock(0, 0, 0);
		this.sendIds = new ArrayList<Integer>();
		this.sendIds.add(0);
		this.sendIds.add(1);
		this.sendIds.add(2);

	}

	/*
	 * To start the Client process input: None Output: boolean value
	 */
	public boolean start() {

		try {
			socket = new Socket(server, 1201); // creating new socket object with server address and port number 1201
		} catch (Exception e1) {
			display("Error connectiong to server:" + e1); // if exception message is displayed on client text area.
		}

		String msg = "Connection has been accepted " + socket.getInetAddress() + ":" + socket.getPort();
		display(msg); // To display message on the Client GUI

		// Creating both input and output Data Stream
		try {
			in = new ObjectInputStream(socket.getInputStream());
			out = new ObjectOutputStream(socket.getOutputStream());
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		// Creating thread to randomly select client thread

		new Thread(new Runnable() {

			@Override
			public void run() {

				try {
					while (true) {
						if (startRandom) {
							int interval = 2 + (new Random().nextInt(10));
							Thread.sleep((interval == 0 ? 2 : interval + 2) * 1000);
							int chosen_id = new Random().nextDouble() > 0.5 ? sendIds.get(0) : sendIds.get(1);
							clientClock.incrementAt(client_id);
							display("Sent updated clock");
							displayClock(clientClock);
							sendMessage(chosen_id);
						}

						// Sleep after every iteration
						Thread.sleep(200);
					}
				} catch (Exception e) {
					e.printStackTrace();
				}

			}
		}).start();

		// Creates the Thread to listen from the server
		new ListenFromServer().start();
		try {
			out.writeObject(username); // writes the username of the client on the socket and sends to server

		} catch (IOException e) {
			System.out.println("writing");
			disconnect(); // disconnect() execution if not able to write on the socket
			return false;
		}
		return true; // Success we inform the Client that it worked
	}

	/*
	 * display method to append the message on Client GUI input: String ouput: None
	 */
	private void display(String msg) {
		cg.display(msg + "\n");
	}
	
	/*
	 * Input: Object of Vector Clock
	 * Output: None
	 * Purpose: display clock on the Client GUI
	 */

	private void displayClock(VectorClock vc) {
		if (vc != null) {
			int[] clk = vc.getClock();
			cg.display(String.format("[%s,%s,%s]", clk[0], clk[1], clk[2]) + "\n");
		}
	}

	/*
	 * sendMessage method writes the message on the socket input: String array
	 * output: None
	 */
	void sendMessage(int chosen_id) {

		String message[] = new String[4];
		message[0] = Integer.toString(chosen_id);
		int[] lc = this.clientClock.getClock();
		message[1] = Integer.toString(lc[0]);
		message[2] = Integer.toString(lc[1]);
		message[3] = Integer.toString(lc[2]);

		try {
			out.writeObject(message);
		} catch (IOException e) {
			System.out.println("write");
		}
	}

	void sendMessage(String[] message) {

		try {
			out.writeObject(message);
		} catch (IOException e) {
			System.out.println("write");
		}
	}

	/*
	 * Disconnect function closes all the Input/Output streams if error has occurred
	 */
	private void disconnect() {
		try {
			if (in != null)
				in.close();
		} catch (Exception e) {

		}
		try {
			if (out != null)
				out.close();
		} catch (Exception e) {

		}
		try {
			if (socket != null)
				socket.close();
		} catch (Exception e) {

		}
	}

	/*
	 * ListenFromServer is the Class that waits for the message from the Server
	 */
	class ListenFromServer extends Thread {

		public void run() {

			while (true) {
				while (socket.isConnected()) {
					try {
						// Response Headers
						String[] response_message = new String[5];
						response_message = (String[]) in.readObject(); // Reads the message from the server
						// if response consists of message
						if (response_message.length == 1) {
							if (response_message[0].equals("Duplicate Username")) { // to check if username is duplicate
								display("Reconnect using unique username");
								Thread.sleep(2000);
								cg.enable_Connect(); // enables the client to connect
								return;
							} else {

								// SET ID received from the response.
								String[] arr = response_message[0].split(" ");
								if (arr.length == 2) {
									client_id = Integer.parseInt(arr[1]);
									sendIds = sendIds.stream().filter(x -> (x != client_id))
											.collect(Collectors.toList());
									display("Username is accepted, Id: " + client_id); // if username is accepted
																						// display
																						// the message.
								}
								continue;
							}
						} else {
							/*
							 * This block creates the object of VectorClock and displays the clock on GUI increments and displays the clock
							 */

							if (response_message.length == 3) {
								VectorClock receivedClock = new VectorClock(response_message);
								display("Received clock:");
								displayClock(receivedClock);
								clientClock.incrementAt(client_id);
								clientClock = VectorClock.updateClock(clientClock, receivedClock);
								display("Clock updated:");
								displayClock(clientClock);
							}

							else {
								cg.update_comboBox(response_message);
							}
						}
					} catch (Exception e) {
						e.printStackTrace();
						System.out.println("reading");
						if (cg != null)
							// cg.connectionFailed();
							break;
					}
				}
			}
		}
	}
}
