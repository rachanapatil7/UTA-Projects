/*Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

import java.io.*;
import java.net.*;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.*;
import java.util.concurrent.LinkedBlockingQueue;

/*
 * class for MS_Server starts below
 * Reference:- https://www.dreamincode.net/forums/topic/259777-a-simple-chat-program-with-clientserver-gui-optional/ 
 * (Base code)
 */

public class MS_Server {

	private ArrayList<ClientThread> client_list = new ArrayList<ClientThread>(); // To store the list of active Client
	public ArrayList<String> online_users = new ArrayList<String>(); // To store the list of active online online_users
	private int ID_COUNTER = 0;
	private MS_ServerGUI sg; // MS_ServerGUI object
	private ClientThread ct; // ClientThread object
	private int port; // The port number which listens for connection
	private boolean server_running; // the boolean variable used to turn off the server
	int clientID;

	/*
	 * server constructor which receives the port to listen
	 */
	public MS_Server(int port) {
		this(port, null);
	}

	/*
	 * Initialize Server
	 */
	public MS_Server(int port, MS_ServerGUI sg) {
		this.sg = sg;
		this.port = port;
		clientID = 0;
	}

	/*
	 * Server start() listens for client requests continuously accepts it and adds
	 * it in arraylist Displays online users input and output=none
	 */
	public void start() {
		server_running = true;
		// Socket server is created and waits for connection requests
		try {
			// The socket used by the server
			ServerSocket serverSocket = new ServerSocket(port);
			// Infinite loop to wait for connections by Client
			while (server_running) {
				display("Clients to send request on the port " + port + "."); // Server waiting for clients
				Socket socket = serverSocket.accept(); // Accept client connection
				if (!server_running) // To stop the server
					break;
				ClientThread thread1 = new ClientThread(socket, ID_COUNTER++);
				if (thread1.init()) {
					client_list.add(thread1); // Add client to the Client Array List
					String user = thread1.getUsername(); // user is stored with particular thread username
					online_users.add(user); // added in arraylist
					display("Online Users:");
					for (int i = 0; i < online_users.size(); ++i) {
						display(online_users.get(i)); // display the online users
					}
					thread1.start();
				}
			}

			// To stop the server
			try {
				serverSocket.close();
				// Disconnect all the client connections
				for (int i = 0; i < client_list.size(); ++i) {
					ClientThread tc = client_list.get(i);
					try {
						tc.in.close();
						tc.out.close();
						tc.socket.close();
					} catch (IOException e) {
						e.printStackTrace();
					}
				}
			} catch (Exception e) {
				display("Exception closing the server and clients: " + e);

			}
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	void display(String string) {
		sg.display(string + "\n");
	}

	/*
	 * To stop the server
	 */
	protected void stop() {
		server_running = false;
		try {
			new Socket("127.0.0.1", port);
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	// If the client disconnects, it has to be removed from the Client List
	synchronized void remove(int id) {
		// Search for the Client in the Client array List
		for (int i = 0; i < client_list.size(); ++i) {
			ClientThread ct = client_list.get(i);

			if (ct.id == id) {
				client_list.remove(i);

				return;
			}
		}
	}

	/*
	 * Instance of the thread for the clients
	 */
	class ClientThread extends Thread {
		// socket
		Socket socket;
		ObjectInputStream in;
		ObjectOutputStream out;
		// my unique id used for disconnecting
		int id;
		// The Username of the Client
		String username;
		public ArrayList<String> duplicate = new ArrayList<String>();
		// The date I connect to the server
		String date;

		private MessageService messageService;
		private boolean isConnected;

		/*
		 * Constructor to create input and output streams,check for duplicate
		 * input:socket
		 */

		ClientThread(Socket socket, int id) {
			// id= ++clientID;
			this.socket = socket;
			this.id = id;
		}

		public boolean init() {
			// Creating both Input and Output Data Streams
			try {
				out = new ObjectOutputStream(socket.getOutputStream());
				in = new ObjectInputStream(socket.getInputStream());
				username = (String) in.readObject();
				boolean isDuplicate = false;
				ClientThread tempCt = this;
				for (ClientThread ct : client_list) {
					if (ct.getUsername().equalsIgnoreCase(username)) {
						isDuplicate = true;
						break;
					}
				}
				// Checking if username entered is already present online
				if (isDuplicate) {
					sendMessage(new String[] { "Duplicate Username" });
					for (int i = 0; i < client_list.size(); i++) {
						ClientThread ct = client_list.get(i);
						if (ct.getId() == this.id) {
							client_list.remove(i);
							break;
						}
					}
					return false;
				} else {
					sendMessage(new String[] { "Accepted" });
				}

				isConnected = true;

			} catch (Exception e) {
				display("Exception creating new Input/output Streams: " + e);
				return false;
			}

			// get that thread which is mapped with that username.
			messageService = MessageService.getInstance(getUsername());

			try {
				messageService.refreshClientQueue(getUsername()); // Refresh Client Queue
				return true;
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			return true;
		}

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
		 * Input:None
		 * Output:Int 
		 * Purpose: The instance of client thread is captured
		 */
		public int getClientThreadId() {
			return this.id;
		}

		/*
		 * Input,Output:None Purpose: The instance of client thread is captured
		 */

		public void startWriteThread() {
			ClientThread ct = this; // present instance is captured with the object of ClientThread
			new Thread(new Runnable() {
				@Override
				public void run() {
					while (ct.isConnected) {
						try {
							Thread.sleep(200);
							String[] message = ct.messageService.getMessage(ct.getUsername()); // message is captured
																								// and sent.
							if (message != null) {
								ct.sendMessage(message);
							}
						} catch (Exception e) {
						}
					}
				}
			}).start();
		}

		/*
		 * To continue running until the server logs out
		 * Reference:-https://stackoverflow.com/questions/2307291/getting-raw-http-
		 * response-headers
		 */
		public void run() {

			startWriteThread(); // function is executed

			boolean server_running = true;
			while (server_running) {

				String[] request_message = new String[4];
				String[] response_message = new String[5];
				try {

					Thread.sleep(500);
					request_message = (String[]) in.readObject();
					// Timestamps
					Date date = new Date();
					DateFormat formatDate = new SimpleDateFormat("DD/MM/YYYY hh:mm:ss");
					String dateFormatted = formatDate.format(date);

					// Response Headers
					response_message[0] = "HTTP/1.1 200 OK \n\r Server: localhost";
					response_message[1] = "Content-type: message \n\r Date: " + dateFormatted;
					response_message[2] = "Content-Length: " + request_message[3].length();
					response_message[3] = "\r\n";
					response_message[4] = "";

					String req = "";
					for (String s : request_message) {
						req += s;
					}

					sg.display(req);

					// If the Client request headers contain GET request
					if (request_message[0].contains("GET")) {
						response_message[1] = "Content-type: client-list";
						for (ClientThread ct : client_list) {
							response_message[4] += ct.getUsername() + ",";
						}
						response_message[4] += "broadcast";

						messageService.deliverMessage(this.getUsername(), response_message); // message is delivered to
																								// recipient
						messageService.storeQueues(); // message is stored

						// sendMessage(response_message);
					}

					// if the Client request headers need to send messages to broadcast
					else if (request_message[0].contains("POST")
							&& request_message[1].toLowerCase().contains("broadcast")) {

						response_message[4] = request_message[3] + "\n The message is (1-All) ";

						messageService.broadcastMessage(this.getUsername(), response_message); // message is delivered
																								// to all recipients
						messageService.storeQueues(); // message is stored

//						for (ClientThread ct : client_list) {
//							if (!ct.getUsername().equals(this.getUsername())) {
//								if (!ct.sendMessage(response_message)) {
//									client_list.remove(ct);
//								}
//							}
//						}
					}

					// if the client is sending messages to one another client
					else if (request_message[0].contains("POST")
							&& !(request_message[1].toLowerCase().contains("broadcast"))) {
						String user = request_message[1].substring(11).trim();
						response_message[4] = request_message[3] + "\n The message is (1-1) ";

						messageService.deliverMessage(user, response_message); // message is delivered to a recipient
						messageService.storeQueues(); // message is stored

//						for (ClientThread ct : client_list) {
//							if (ct.getUsername().equalsIgnoreCase(user)) {
//								ct.sendMessage(response_message);
//								display("\nMessage sent to appropriate client");
//							}
//						}
					}
					// If client disconnects and needs to be removed from the client array List

					else if (request_message[0].contains("DELETE")) {
						this.isConnected = false;
						String[] agent = request_message[1].split(" ");
						// for loop to iterate over clients and remove disconnected clients
						for (Iterator it = client_list.iterator(); it.hasNext();) {
							ClientThread clientThread = (ClientThread) it.next();
							if (clientThread.getUsername().equalsIgnoreCase(agent[1].trim())) {
								client_list.remove(clientThread);
								displayUsers();
								return;
							}
						}
					}
				} catch (Exception e) {
					System.out.println("Exception of read write produced!");
					break;
				}
			}
			remove(id); // To remove the Clients
			// close();
		}
		/*
		 * Purpose: Display online clients after one of the clients getting disconnected.
		 * Input,Output: None
		 * 
		 */

		public void displayUsers() {
			display("Online Users");
			for (int i = 0; i < client_list.size(); ++i) {
				display(client_list.get(i).getUsername()); // display the online users after disconnecting
			}
		}

		/*
		 * sendMessage() describes the response to be sent to the Server Input: String
		 * array Output: boolean value
		 */

		private boolean sendMessage(String[] response) {
			// If socket is not connected ,close
			if (!socket.isConnected()) {
				close();
				return false;
			}
			try {
				out.writeObject(response);
			} catch (Exception e) {
				e.printStackTrace();
			}
			return true;
		}

		/*
		 * close() Closes Socket connections Input,output:none
		 */
		private void close() {

			try {
				if (out != null) {
					out.close();
				}
				if (in != null) {
					in.close();
				}
				if (socket != null) {
					socket.close();
				}
			} catch (Exception e) {
			}
		}

	}
}
