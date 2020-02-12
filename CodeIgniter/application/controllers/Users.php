<?php

		class users extends CI_controller{

function __construct() {
parent::__construct();
$this->load->model('user_model');
}
function index() {

$this->load->helper(array('form','url'));


			$this->load->library('form_validation');

			$this->form_validation->set_rules('mail', 'Mail', 'required');

			$this->form_validation->set_rules('pass', 'Password', 'required');

			$this->form_validation->set_rules('fname', 'First Name', 'required');

			$this->form_validation->set_rules('lname', 'Last Name', 'required'); 

			$this->form_validation->set_rules('address', 'Address', 'required');

			$this->form_validation->set_rules('city', 'city', 'required'); 

			$this->form_validation->set_rules('sts', 'States', 'required');

			$this->form_validation->set_rules('postal', 'Postal Code', 'required'); 


if ($this->form_validation->run() === FALSE) { 

         				
			
							$this->load->view('templates/head.php');
							$this->load->view('register.php');
					
         			}


         			 else {
//Setting values for tabel columns
$data = array(


					'mail' => $this-> input ->post('name'),
					'pass' => $this-> input ->post('pass'),
					'fname' => $this-> input ->post('fname'),
					'lname' => $this-> input ->post('lname'),
					'address' => $this-> input ->post('address'),
					'city' => $this-> input ->post('city'),
					'sts' => $this-> input ->post('sts'),
					'postal' => $this-> input ->post('postal')

				);
//Transfering data to Model
$this->user_model->form_insert($data);
$data['message'] = 'Data Inserted Successfully';
//Loading View
$this->load->view('pages/register.php', $data);
}
}

		/*	public function register(){

				//$data['title']='Sign Up';

			$this->load->helper(array('form','url'));


			$this->load->library('form_validation');

			$this->form_validation->set_rules('mail', 'Mail', 'required');

			$this->form_validation->set_rules('pass', 'Password', 'required');

			$this->form_validation->set_rules('fname', 'First Name', 'required');

			$this->form_validation->set_rules('lname', 'Last Name', 'required'); 

			$this->form_validation->set_rules('address', 'Address', 'required');

			$this->form_validation->set_rules('city', 'city', 'required'); 

			$this->form_validation->set_rules('sts', 'States', 'required');

			$this->form_validation->set_rules('postal', 'Postal Code', 'required'); 



					if ($this->form_validation->run() === FALSE) { 

         				
			
							$this->load->view('templates/head.php');
							$this->load->view('pages/register.php');
					
         			}

         			else { 

            			$this->load->model('user_model','',TRUE);	
            			$data = array(
					'mail' => $this-> input ->post('name'),
					'pass' => $this-> input ->post('pass'),
					'fname' => $this-> input ->post('fname'),
					'lname' => $this-> input ->post('lname'),
					'address' => $this-> input ->post('address'),
					'city' => $this-> input ->post('city'),
					'sts' => $this-> input ->post('sts'),
					'postal' => $this-> input ->post('postal')

			);

            		$this->user_model->insert_data($data);
            		redirect(base_url()."users/inserted");

         			} 

		}

		public function inserted(){

			$this->load->view('templates/head.php');
							$this->load->view('pages/register.php');

		}


*/

		}

?>