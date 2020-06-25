/*Name: Rachana Naganagouda Patil
 * Student Id: 1001644227
 */

import java.io.*;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.HashMap;
import java.util.Map;
import java.util.concurrent.ConcurrentLinkedQueue;

/*
 * Purpose: The purpose of this class is to create queues for each client username,deliver message from the queues for the
 * intended recipients. 
 * 
 */

public class MessageService {
	// variables are declared and initialized.
	private static final String FILE_NAME = "queue.data";
	private static MessageService ins;
	private static HashMap<String, ConcurrentLinkedQueue<String[]>> map = new HashMap<>();
	
	
	
	/*
	 * Input: username
	 * Output:instance for the MessageService class
	 * Purpose: This function checks for the instance created for the particular username. If its not present, it will create
	 * new instance. If instance is present with respect to username and the value respect to username is null, new queue is 
	 * created. 
	 * (Sources for the syntax:)https://www.w3schools.com/java/java_hashmap.asp
	 */

	public static MessageService getInstance(String username) {
		if (ins == null) {
			ins = new MessageService();             //creating instance
		}
		//Check if that instance has queue associated with that username
		if (MessageService.map.containsKey(username)) {
			if (MessageService.map.get(username) == null) {
				MessageService.map.put(username, new ConcurrentLinkedQueue<>());
			}
		} else {
			MessageService.map.put(username, new ConcurrentLinkedQueue<>());
		}
		return ins;
	}
	
	/*
	 * Input: None
	 * Output: HashMap object 
	 * Purpose: Read the contents of the file and access it in the form of HashMap(string, message)
	 *  
	 */

	public static HashMap<String, ConcurrentLinkedQueue<String[]>> getQueueFromFile() throws Exception {
		if (Files.exists(Paths.get(FILE_NAME))) {
			FileInputStream f_in = new FileInputStream(FILE_NAME);
			ObjectInputStream ois = new ObjectInputStream(f_in);
			HashMap<String, ConcurrentLinkedQueue<String[]>> temp_map = (HashMap<String, ConcurrentLinkedQueue<String[]>>) ois
					.readObject();
			ois.close();
			f_in.close();
			return temp_map;
		}
		return null;
	}
	
	/*
	 * Input: None
	 * Output: None 
	 * Purpose: If the file exists, create objects and read contents of the file with the help of HashMap object.After reading,
	 * close the objects.
	 * 
	 */

	public static void readQueues() throws Exception {
		if (Files.exists(Paths.get(FILE_NAME))) {
			FileInputStream f_in = new FileInputStream(FILE_NAME);
			ObjectInputStream ois = new ObjectInputStream(f_in);
			map = getQueueFromFile();
			ois.close();
			f_in.close();
		}
	}
	
	/*
	 * Input: None
	 * Output: None 
	 * Purpose: Method to create a file, create an object and with that object write hash map values in that file and close the 
	 * objects. This is done for persistent data.
	 */

	public synchronized void storeQueues() throws Exception {
		FileOutputStream f_out = new FileOutputStream(FILE_NAME);
		ObjectOutputStream oos = new ObjectOutputStream(f_out);
		oos.writeObject(map);
		oos.close();
		f_out.close();
	}
	
	/*
	 * Input: username as a string
	 * Output: None 
	 * Purpose: Function to restore the persisted queue for a disconnected client.
	 */

	public synchronized void refreshClientQueue(String username) throws Exception {
		HashMap<String, ConcurrentLinkedQueue<String[]>> temp_map = getQueueFromFile();
		if (temp_map != null) {
			if (temp_map.containsKey(username)) {
				map.put(username, temp_map.get(username));
			}
		}
	}
	
	/*
	 * Input: username
	 * Output:String Array 
	 * Purpose: The message is accessed with respect to username(as a key) 
	 * References for the Syntax:https://www.geeksforgeeks.org/concurrentlinkedqueue-in-java-with-examples/ 
	 */

	public String[] getMessage(String username) {
		if (username != null) {
			ConcurrentLinkedQueue<String[]> clientQueue = map.get(username);
			if (!clientQueue.isEmpty()) {
				return clientQueue.remove();
			} else
				return null;
		} else
			return null;
	}
	
	/*
	 * Input:intented client as a string, 
	 * Output: None
	 * Purpose: Checks if intended recipient is present in HashMap. If present, message is added for that intended recipient in 
	 * HashMap.
	 */

	public void deliverMessage(String recpient, String message[]) {
		if (map.containsKey(recpient)) {
			map.get(recpient).add(message);
		}
	}
	
	/*
	 * Input: sender as a string, message as a string array
	 * Output: None
	 * Purpose: Sends broadcasted message to other clients
	 * 
	 */

	public void broadcastMessage(String sender, String message[]) {
		if (sender != null) {
			for (Map.Entry<String, ConcurrentLinkedQueue<String[]>> item : map.entrySet()) {
				if (!item.getKey().equals(sender)) {
					deliverMessage(item.getKey(), message);
				}
			}
		}
	}
	}
