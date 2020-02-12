<?php
	
	class leancont extends CI_Controller{

		function __construct() {
			//$data["fetch"]="";
			//$data=array();
			parent::__construct();
			$this->load->model('insert_model');
		//$data['fetch']= $this->insert_model->items_fetch();
		//var_dump($this->insert_model->items_fetch());
		}




		public function view($page ='home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
           $data["fetch"]="";
			$data=array();
$this->load->model('insert_model');
		$data['fetch']= $this->insert_model->items_fetch();
			//$this->load->helper('url');
			$data['title']=ucfirst($page);

			$this->load->view('templates/header');
			//$this->load->view('templates/nav.php');
			$this->load->view('pages/'.$page,$data);
			
			$this->load->view('templates/footer');



		}

		public function HomePage1(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/Homepage1.php');
				$this->load->view('templates/footer');
		}

		public function AboutUs(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/AboutUs.php');
					$this->load->view('templates/footer');

		}

		

		public function SignUp(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/SignUp.php');
					$this->load->view('templates/footer');

		}

		public function ContactUs(){

			//$this->load->view('templates/header');
			
				//$this->load->view('pages/ContactUs.php');
				//$this->load->view('templates/footer');

				$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('fname', 'Nombre', 
					'required|min_length[4]');
				$this->form_validation->set_rules('lname', 'Appelido', 'required|min_length[4]');
				$this->form_validation->set_rules('mail', 'Correo', 'required|min_length[4]|max_length[40]|callback_alpha_space');
				$this->form_validation->set_rules('topic', 'Tema', 'required'); 
				$this->form_validation->set_rules('message', 'Mensaje', 'required');
				
				if ($this->form_validation->run() === FALSE) { 
					$this->load->view('templates/header');
			
				$this->load->view('pages/ContactUs.php');
				$this->load->view('templates/footer');
				}
				else {
         			 		//die("Continue");
         			 		$data = array(
							
							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'mail' => $this->input->post('mail'),
							'topic' => $this->input->post('topic'),
							'message' => $this->input->post('message'),
							
							);
							$this->insert_model->contactus_insert($data);
							$data['message'] = 'Data Inserted Successfully';
							
						$this->load->view('templates/header');
			
				$this->load->view('pages/ContactUs.php');
				$this->load->view('templates/footer');
			}

		}

		public function Login1(){
				$this->load->database();
 				$this->load->helper('url');

 				if($this->input->post('enter'))
 				{
					 $e=$this->input->post('uname');
					 $p=$this->input->post('pass');
 
 					$que=$this->db->query("select * from users where mail='".$e."' and password='$p'");
 					$row = $que->num_rows();
 					if($row)
 					{
 						redirect('pages/IndiviHome.php');
 					}
 					else
 					{
 						$data['error']="<h3 style='color:red'>Invalid login details</h3>";
 					} 
 				}
 				$this->load->view('Login1',@$data); 
 
 
			//$this->load->view('templates/header');
			
				//$this->load->view('pages/Login1.php');
					//$this->load->view('templates/footer');

		}
		
		public function BuyFromUs(){
			$this->load->model('insert_model');
		$data['fetch']= $this->insert_model->items_fetch();

			$this->load->view('templates/header');
			
				$this->load->view('pages/BuyFromUs.php',$data);
					$this->load->view('templates/footer');

		}

		public function buy(){

				$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('bfu', 'Number', 'required');

				if ($this->form_validation->run() === FALSE) { 
						$this->load->view('pages/BFU2.php');
				}
				else {
         			 		
         			 		$data = array(
							'quantity' => $this->input->post('bfu'),
							
							'product'=>'FoodEvent',
							);
							$this->insert_model->data_entry($data);
							
							
							
						}

				$this->load->view('templates/header');
				$this->load->view('pages/BFU2.php');
				$this->load->view('templates/footer');
		}

		public function AgentLeanHome(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/AgentLeanHome.php');
					$this->load->view('templates/footer');

		}

		public function List_of_Volunteers(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/List_of_Volunteers.php');
					$this->load->view('templates/footer');

		}

		public function List_of_Foundations(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/List_of_Foundations.php');
					$this->load->view('templates/footer');

		}

		public function AddEvent(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/AgentEvent.php');
					$this->load->view('templates/footer');

		}

		public function AgentLeanProfile(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/AgentLeanProfile.php');
					$this->load->view('templates/footer');

		}

		public function BussinessHome(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/BussinessHome.php');
					$this->load->view('templates/footer');

		}

		public function BussinessProfile(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/BussinessProfile.php');
					$this->load->view('templates/footer');

		}

		public function IndiviHome(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/IndiviHome.php');
					$this->load->view('templates/footer');

		}

		public function IndiviProfile(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/IndiviProfile.php');
					$this->load->view('templates/footer');

		}

		public function List_of_Events(){

			$this->load->view('templates/header');
			
				$this->load->view('pages/List_of_Events.php');
					$this->load->view('templates/footer');

		}

		public function register(){

			
				//$this->load->view('templates/head');
				//$this->load->view('pages/register.php');
				$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('mail', 'Mail', 'required|min_length[4]|max_length[40]|callback_alpha_space');
				$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]');
				$this->form_validation->set_rules('fname', 'First Name', 'required|min_length[4]');
				$this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[4]'); 
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('city', 'city', 'required'); 
				$this->form_validation->set_rules('sts', 'States', 'required');
				$this->form_validation->set_rules('postal', 'Postal Code', 'required'); 

				if ($this->form_validation->run() === FALSE) { 
						$this->load->view('pages/register.php');
				}
				else {
         			 		//die("Continue");
         			 		$data = array(
							'mail' => $this->input->post('mail'),
							'password' => $this->input->post('pass'),
							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'address' => $this->input->post('address'),
							'city' => $this->input->post('city'),
							'state' => $this->input->post('sts'),
							'postal' => $this->input->post('postal'),
							'role'=>'indivi',
							);
							$this->insert_model->user_insert($data);
							$data['message'] = 'Data Inserted Successfully';
							
							$this->load->view('pages/register.php');
						}
			}


		public function registerbus(){

			
				//$this->load->view('templates/head');
				//$this->load->view('pages/register.php');
				$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('mail', 'Mail', 'required|min_length[4]|max_length[40]|callback_alpha_space');
				$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]');
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required'); 
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('city', 'city', 'required'); 
				$this->form_validation->set_rules('sts', 'States', 'required');
				$this->form_validation->set_rules('postal', 'Postal Code', 'required'); 
				$this->form_validation->set_rules('bus', 'Type', 'required');

				if ($this->form_validation->run() === FALSE) { 
						$this->load->view('pages/registerbus.php');
				}
				else {
         			 		//die("Continue");
         			 		$data = array(
							'mail' => $this->input->post('mail'),
							'password' => $this->input->post('pass'),
							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'address' => $this->input->post('address'),
							'city' => $this->input->post('city'),
							'state' => $this->input->post('sts'),
							'postal' => $this->input->post('postal'),
							'role'=>'bussi',
							'type_buss' => $this->input->post('bus'),
							);
							$this->insert_model->user_insert($data);
							$data['message'] = 'Data Inserted Successfully';
							
							$this->load->view('pages/registerbus.php');
						}
			}
public function lean(){

			
				//$this->load->view('templates/head');
				//$this->load->view('pages/register.php');
				$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('mail', 'Mail', 'required|min_length[4]|max_length[40]|regex_match[/^\w+@\w+.com$/]');
				$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]');
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required'); 
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('city', 'city', 'required'); 
				$this->form_validation->set_rules('sts', 'States', 'required');
				$this->form_validation->set_rules('postal', 'Postal Code', 'required'); 

				if ($this->form_validation->run() === FALSE) { 
						$this->load->view('pages/registerlean.php');
				}
				else {
         			 		//die("Continue");
         			 		$data = array(
							'mail' => $this->input->post('mail'),
							'password' => $this->input->post('pass'),
							'fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'address' => $this->input->post('address'),
							'city' => $this->input->post('city'),
							'state' => $this->input->post('sts'),
							'postal' => $this->input->post('postal'),
							'role'=>'lean_staff',
							);
							$this->insert_model->user_insert($data);
							$data['message'] = 'Data Inserted Successfully';
							
							$this->load->view('pages/registerlean.php');
						}
			}

			public function alpha_space($str){
				$this->load->helper(array('form','url'));
				$this->load->library('form_validation');
				if(! preg_match("/^[A-Za-z0-9]+@[A-Za-z0-9]+.com+$/i", $str)){
					$this->form_validation->set_message('alpha_space','The %s field should have mail in proper format');
					return false;

				}
				else{
					return true;
				}
			}


			public function subscribe(){

				$this->load->helper(array('form','url'));


				$this->load->library('form_validation');

				$this->form_validation->set_rules('email', 'Mail', 'required');

				if ($this->form_validation->run() === FALSE) { 

         			$this->load->view('templates/header');
			
				$this->load->view('pages/Homepage1.php');
				$this->load->view('templates/footer');	
			
					
						
         		}


         			 else {
         			 		//die("Continue");
         			 		$data = array(
							'Email' => $this->input->post('email'));
							$this->insert_model->form_insert($data);
							$data['message'] = 'Data Inserted Successfully';
						}

				


			}

			


}



 ?>







