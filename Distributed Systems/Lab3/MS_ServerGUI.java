/*Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

import java.awt.EventQueue;
import javax.swing.JFrame;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

/*
 * class for MS_ServerGUI starts below
 * Reference:- https://www.dreamincode.net/forums/topic/259777-a-simple-chat-program-with-clientserver-gui-optional/ 
 * (Base code)
 */

public class MS_ServerGUI extends JFrame implements ActionListener {
	// All GUI components are initialized
	private JFrame frame;
	private JButton btnStart;
	private JButton btnStop;
	private JButton btnClose;
	private JButton btn_Users;
	private JButton btn_Clear;
	private JTextArea textArea;
	private JScrollPane jsp;
	private JScrollPane scrollPane;

	private MS_Server server; // The client object

	/*
	 * MS_ServerGUI Constructor calling the initialize() and display initial message
	 */
	public MS_ServerGUI() {
		server = null;
		initialize();
		display("Messages log.\n");
	}

	/*
	 * display method to append the messages on the textArea of the Server GUI
	 * input: String output:None
	 */
	void display(String str) {
		textArea.append(str);
	}

	/*
	 * actionPerformed method describes start or stop of server when clicked input:
	 * Action Event of the button output: None
	 */

	public void actionPerformed(ActionEvent e) {

		int port = 1201;
		// if server is running and need to stop
		if (server != null) {
			server.stop();
			server = null;
			return;
		}
		// to create a new Server
		server = new MS_Server(port, this);
	
		// start a server thread
		new ServerRunning().start();
	}

	/*
	 * A thread to run the Server
	 */

	class ServerRunning extends Thread {
		public void run() {
			server.start();
			// If Server crashes
			display("Server has stopped\n");
			server = null;
		}
	}

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					MS_ServerGUI window = new MS_ServerGUI();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(500, 500, 500, 500);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		btnStart = new JButton("Start");
		btnStart.addActionListener(this);

		btnStart.setBounds(22, 339, 97, 25);
		frame.getContentPane().add(btnStart);

		btnStop = new JButton("Stop");
		btnStop.addActionListener(this);

		btnStop.setBounds(178, 339, 97, 25);
		frame.getContentPane().add(btnStop);

		btnClose = new JButton("Close");
		btnClose.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				System.exit(0);
			}
		});

		btnClose.setBounds(327, 339, 97, 25);
		frame.getContentPane().add(btnClose);

		scrollPane = new JScrollPane();
		scrollPane.setBounds(12, 30, 436, 291);
		frame.getContentPane().add(scrollPane);

		textArea = new JTextArea();
		scrollPane.setViewportView(textArea);

		btn_Clear = new JButton("Clear");
		btn_Clear.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				textArea.setText("");
				textArea.append("Messages Log");
			}
		});

		btn_Clear.setBounds(22, 396, 97, 25);
		frame.getContentPane().add(btn_Clear);

		btn_Users = new JButton("Online Users");
		btn_Users.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				textArea.append("\n Online users : \n");
				for (int i = 0; i < server.online_users.size(); ++i) {
					display(server.online_users.get(i) + "\n");
				}
			}
		});
		btn_Users.setBounds(178, 396, 97, 25);
		frame.getContentPane().add(btn_Users);

	}
}
