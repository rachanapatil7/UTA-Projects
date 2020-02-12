<?php
class insert_model extends CI_Model{
function __construct() {
parent::__construct();
}
function form_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('subscribe', $data);
}

function user_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('users', $data);
}

function items_fetch(){

	//this->load->database();
	$data=$this->db->get("buyfromus");
	return $data;

}

function data_entry($data){

	$this->db->insert('buy', $data);

}

function contactus_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('contactus', $data);
}

function events_fetch(){

	//this->load->database();
	$data=$this->db->get("listofevents");
	return $data;

}

function delete_row($id){

	return $this->db->delete("listofevents",array('ID'=>$id));

}
function add_insert($data){
	
$this->db->insert('listofevents', $data);
}

function getaRecords($id){

	$query=$this->db->get_where('listofevents',array('ID'=>$id));
	var_dump($id);
	//if($query->num_rows()>0){
		//return $query->row();
	//}
	//$this->db->select('*');
	//$this->db->where('ID',$id);
	//
	//$query=$this->db->get('listofevents');
	//$this->db->from('listofevents');
	//$query=$this->db->get();	
	return $query->row();
}

function updateuserid($data,$id){
	
	//$this->db->set($data);
	$this->db->where('ID',$id);
	var_dump($id);
	$this->db->update('listofevents',$data);
	print_r($data);

	

		return true;
	
}



function getprofile()
{
	$query=$this->db->get("indiviprofile");
	return $query;
}

function updateprofile($data)
{
	$this->db->update('indiviprofile', $data);
}

}
?>