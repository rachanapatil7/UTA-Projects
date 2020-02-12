<?php
class Login extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	}


	public function login()
	{

	$this->load->view('templates/header');
			
				
		$this->load->model('insert_model');			
		$this->load->view('pages/Login1.php',@$data);	
		$this->load->view('templates/footer');	
		
		if($this->input->post('enter'))
		{
			$e=$this->input->post('uname');
			$p=$this->input->post('pass');
	
			/*$que=$this->db->query("select * from users where mail='".$e."' and password='$p'");
			$row = $que->num_rows();
			if($row)
			{
				
				redirect('Login/dashboard');
			}*/
 //$email    = $this->input->post('email',TRUE);
   // $password = md5($this->input->post('password',TRUE));
   $que=$this->db->query("select * from users where mail='".$e."' and password='$p'");
    	if($que->num_rows() > 0)
    	{
		        $data  = $que->row_array();
		        $email  = $data['mail'];
		        $password = $data['password'];
		        $role = $data['role'];
		        $sesdata = array(
		            'username'  => $email,
		            'pass'     => $password,
		            'role'     => $role,
		            'logged_in' => TRUE
		        );
		        //$this->session->set_userdata($sesdata);
		        // access login for admin
		        if($role === 'indivi'){
		            redirect('Login/dashboard');
		 
		        // access login for staff
		        }elseif($role === 'bussi'){
		            redirect('Login/dashboard2');
		 
		        // access login for author
		        }else{
		            redirect('Login/dashboard3');
		        }

		}
			else
			{
				$data['error']="<h3 style='color:red'>Invalid login details</h3>";
			}

	}}	

	
		
	
	public function dashboard(){
		$this->load->view('templates/header');
			$this->load->view('pages/IndiviHome.php');
	}
	
	public function dashboard2(){
		$this->load->view('templates/header');
			$this->load->view('pages/BussinessHome.php');
	}
	
	public function dashboard3(){
		$this->load->view('templates/header');
			$this->load->view('pages/AgentLeanHome.php');
	}
	
	
	
}
?>