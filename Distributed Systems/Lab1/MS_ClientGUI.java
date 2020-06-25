/* Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

import java.awt.EventQueue;
import javax.swing.JFrame;
import javax.swing.JTextField;
import javax.swing.JLabel;
import javax.swing.DefaultComboBoxModel;
import javax.swing.DefaultListModel;
import javax.swing.JButton;
import javax.swing.JTextArea;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JComboBox;
import javax.swing.JList;
import javax.swing.JScrollPane;

/*
 * class for Client with its GUI starts below
 * Reference:- https://www.dreamincode.net/forums/topic/259777-a-simple-chat-program-with-clientserver-gui-optional/ 
 * (Base code)
 */

public class MS_ClientGUI extends JFrame implements ActionListener {
	// All GUI components are initialized
	private JFrame frame;
	private JTextField username;
	private JTextField msg;
	private JButton btnConnect;
	private JButton btnDisconnect ;
	private JButton btnSend ;
	private JButton btnRefresh;
	private JTextArea textArea;
	private JComboBox<String> comboBox;
	private JList<String> list;
	private JButton btnListenRefresh;
	private DefaultListModel<String> listModel;
	private JScrollPane scrollPane;
	
	private boolean connected; //boolean value variable for connection   
	private int defaultPort;     //The default Port Number and Host
	private String defaultHost;
	MS_Client client;             //The client object
	

	/*
	 * Constructor calling the initialize method for GUI components
	 */
	public MS_ClientGUI() {
		initialize();
	}
	
	/*
	 * Constructor with parameters for host and port number
	 */
	public MS_ClientGUI(String host, int port)
	{
		defaultPort = port;
		defaultHost = host;
		textArea.setEditable(false);               //Message field is set to False 
		setDefaultCloseOperation(EXIT_ON_CLOSE);   //Close operation on closing window
		setSize(600, 600);
		setVisible(true);
		username.requestFocus();
	}

	/*
	 * display method to append the messages on the textArea of the client GUI
	 * input: String
	 * output:None
	 */
	void display(String str) 
	{
	textArea.append("\n" + str);
	textArea.setCaretPosition(textArea.getText().length() - 1);
	}
	
	/*
	 * update_comboBox updates the dropdown on the click of refresh button on the Client GUI
	 * input:usename from the response string 
	 * output: clients in the dropdown box
	 * Reference:- https://stackoverflow.com/questions/4747020/how-to-update-jcombobox-content-from-arraylist
	 */
	public void update_comboBox(String[] res)
	{
		String[] client_list=res[4].split(",");
		comboBox.setModel(new DefaultComboBoxModel(client_list));
	}
	
	/*
	 * actionPerformed method describes functionality of each button on clicked
	 * input: Action Event of the button
	 * output: None
	 * Reference:-https://stackoverflow.com/questions/2307291/getting-raw-http-response-headers
	 */
	public void actionPerformed(ActionEvent e) 
	{
		Object button= e.getSource();
		String[] request_message= new String[4];
		//listModel = new DefaultListModel();
		
		//If Connect button is clicked, new object of MS_Client with specified parameters created
		if(button == btnConnect) 
		{
			
			String uname = username.getText().trim();
			client = new MS_Client("localhost", uname, this);       // new object of Client is created
			if(!client.start()) 
				return;
			connected = true;
			//following buttons enabled to true once client connected
			btnDisconnect.setEnabled(true);     
			btnRefresh.setEnabled(true);
			username.setEditable(false);
			return;
		}
		
		//If refresh Client button is clicked
		else if(button == btnRefresh) 
				{
					//Request headers
					request_message[0]= "GET Refresh Client list \n HTTP/1.1 \n Host: localhost\n";
					request_message[1]= "User-Agent:"+client.getUsername();           // username of client is  accessed
					request_message[2]= "\n Content-Type: Text \n Content-Length = 0 \r\n";
					request_message[3]= " ";
					client.sendMessage(request_message);                      //message sent to the server
					return;
				}
				
		//if Send Message button is clicked
		else if(button == btnSend ) 
			{
				String toClient = comboBox.getSelectedItem().toString();   //select client from drop box for the message to be sent
				//Request headers
				request_message[0]= "POST \n HTTP/1.1 \n Host: localhost\n";
				request_message[1]= "User-Agent "+toClient;
				request_message[2]= "\n Content-Type: text \n Content-Length = "+ msg.getText().length()+" \r\n";        //message length
				request_message[3]= client.getUsername()+" : "+msg.getText();                                            //message text
				client.sendMessage(request_message);
				msg.setText("");               // message field is cleared after the message has been sent
				return;
							
			}
		//if Disconnect button is clicked
		else if(button == btnDisconnect) 
		{
			//Request headers
			request_message[0]= "DELETE \n HTTP/1.1 \n Host: localhost\n";
			request_message[1]= "User-Agent "+client.getUsername();                                 //client username
			request_message[2]= "\n Content-Type: Text \n Content-Length = 0 \r\n";
			request_message[3]= " ";
			client.sendMessage(request_message);       // request headers are sent to the Server
			return;
		}
	}
	
	/**
	 * Launch the application.
	 */
	
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					MS_ClientGUI window = new MS_ClientGUI();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}
	
	
	/**
	 * Method to Initialize the contents of the frame.
	 * Input:  None
	 * Output: None
	 */
	private void initialize() {
		frame = new JFrame();
		frame.setBounds(500,500,500,500);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);
		
		username = new JTextField();
		username.setBounds(77, 10, 156, 22);
		frame.getContentPane().add(username);
		username.setColumns(10);
		
		JLabel lblNewLabel = new JLabel("Username");
		lblNewLabel.setBounds(12, 13, 89, 16);
		frame.getContentPane().add(lblNewLabel);
		
		btnConnect = new JButton("Connect");
		btnConnect.addActionListener(this);
	
		
		btnConnect.setBounds(245, 9, 97, 25);
		frame.getContentPane().add(btnConnect);
		
		scrollPane = new JScrollPane();
		scrollPane.setBounds(12, 59, 330, 292);
		frame.getContentPane().add(scrollPane);
		
		textArea = new JTextArea();
		scrollPane.setViewportView(textArea);
		
		JLabel lblEnterMessage = new JLabel("Enter Message");
		lblEnterMessage.setBounds(12, 348, 116, 25);
		frame.getContentPane().add(lblEnterMessage);
		
		msg = new JTextField();
		msg.setBounds(12, 377, 330, 25);
		frame.getContentPane().add(msg);
		msg.setColumns(10);
		
		JLabel lblActivityLog = new JLabel("Message Log");
		lblActivityLog.setBounds(12, 37, 116, 22);
		frame.getContentPane().add(lblActivityLog);
		
		btnDisconnect = new JButton("Disconnect");
		btnDisconnect.addActionListener(this);
		btnDisconnect.setBounds(362, 9, 97, 25);
		frame.getContentPane().add(btnDisconnect);
		
		btnSend = new JButton("Send");
		btnSend.addActionListener(this);
		
		
		btnSend.setBounds(12, 415, 97, 25);
		frame.getContentPane().add(btnSend);
		
		comboBox = new JComboBox<String>();
		comboBox.addActionListener(this);
		comboBox.setBounds(375, 135, 84, 25);
		frame.getContentPane().add(comboBox);
		
		JLabel lblClients = new JLabel("Clients");
		lblClients.setBounds(372, 108, 87, 22);
		frame.getContentPane().add(lblClients);
		
		btnRefresh = new JButton("Refresh");
		btnRefresh.addActionListener(this);
		btnRefresh.setBounds(362, 70, 97, 25);
		frame.getContentPane().add(btnRefresh);
		
		list = new JList<String>();
		list.setBounds(362, 173, 97, 153);
		frame.getContentPane().add(list);
		
		btnListenRefresh = new JButton("ListRefresh");
		btnListenRefresh.addActionListener(this);
		btnListenRefresh.setBounds(362, 354, 97, 25);
		frame.getContentPane().add(btnListenRefresh);
		
		JButton btnClose = new JButton("Close");
		btnClose.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				frame.dispose();
			}
		});
		btnClose.setBounds(362, 415, 97, 25);
		frame.getContentPane().add(btnClose);
	}
}
