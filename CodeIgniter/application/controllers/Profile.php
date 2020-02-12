<?php

	class Profile extends CI_controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url','form');
			$this->load->model('insert_model');
		}
		
		public function profile(){

			$data['fetch']=$this->insert_model->getprofile();

			$this->load->view('templates/header');
			
				$this->load->view('pages/IndiviProfile.php',$data);
					$this->load->view('templates/footer');
		}

		public function update_profile() {

			$data["fetch"]="";
			$data=array();
			$data['fetch']=$this->insert_model->getprofile();
			$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('fname', 'Nombre', 
					'required|min_length[4]|max_length[40]');
				$this->form_validation->set_rules('lname', 'Appelido', 'required|min_length[4]');
				$this->form_validation->set_rules('mail', 'Correo', 'required|min_length[4]|regex_match[/^\w+@\w+.com$/]');
				$this->form_validation->set_rules('phone', 'Telephono', 'required|min_length[4]|regex_match[/^\d{10}$/]');
				$this->form_validation->set_rules('username', 'Usuario', 'required|min_length[4]|regex_match[/^\w{4,10}$/]');
				$this->form_validation->set_rules('password', 'Contrasena', 'required|min_length[4]|regex_match[/^\d{4,10}$/]');
				
				
				if ($this->form_validation->run() === FALSE) { 
					$this->load->view('templates/header');
			
				$this->load->view('pages/IndiviProfile.php');
				$this->load->view('templates/footer');
				}
				else {

					 $data = array(
        	'fname' => $this->input->post('fname'),
        	'lname' => $this->input->post('lname'),
        	'mail' => $this->input->post('phone'),
        	'phone' => $this->input->post('fname'),
        	'username' => $this->input->post('username'),
        	'password' => $this->input->post('password'),

        );
        $this->insert_model->updateprofile($data);
						
        echo 'order has successfully been updated';
        $this->load->view('templates/header');
			
				$this->load->view('pages/IndiviProfile.php',$data);
					$this->load->view('templates/footer');
       

}
  
}
} 









?>