<?php
	
	class Eventos extends CI_controller
	{
			public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url','form','file');
			$this->load->model('insert_model');
		}
		
		
		public function events()
		{

				$data["fetch"]="";
				$data=array();
				$this->load->model('insert_model');
				$data['fetch']= $this->insert_model->events_fetch();

				$this->load->view('templates/header');
			
				$this->load->view('pages/List_of_Events.php',$data);
				$this->load->view('templates/footer');
		}

		public function delete($id)
		{
				$data["fetch"]="";
				$data=array();
				$this->load->model('insert_model');
				$data['fetch']= $this->insert_model->events_fetch();
				if($this->insert_model->delete_row($id)){
					echo "Deleted"; 	
					$this->load->view('templates/header');
			
					$this->load->view('pages/List_of_Events.php',$data);
					$this->load->view('templates/footer');
				}
				else{
					echo "No data found";
					
				}
				
		}


		public function add(){
				
				$this->load->helper(array('form','url','file'));
				$this->load->library('form_validation');
				$config['upload_path']='./images1';
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = '*';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload',$config);
                $this->upload->do_upload('file_name');
                $file_name=$this->upload->data();
                $data=array('file_name'=>$file_name['file_name']);
                //$data=array('upload_data'=>$this->upload->data());

					
				//$this->load->model('insert_model');
				$this->form_validation->set_rules('fname', 'Name', 'required');
				$this->form_validation->set_rules('response', 'responsibleName', 'required|min_length[8]');
				$this->form_validation->set_rules('place', 'Place', 'required');
				$this->form_validation->set_rules('dat', 'Date', 'required'); 
				$this->form_validation->set_rules('time', 'Time', 'required');
				$this->form_validation->set_rules('amt', 'Amount', 'required'); 
				


				if ($this->form_validation->run() === FALSE) { 
						$this->load->view('templates/header');
			
				$this->load->view('pages/AddEvent.php');
					$this->load->view('templates/footer');
				}
				else {
         			 		//die("Continue");
         			 		$data = array(
							'details' => $this->input->post('fname'),
							'place' => $this->input->post('place'),
							
							'dateof' => $this->input->post('dat'),
							'image'=> $data['file_name']
							
							);
							$this->insert_model->add_insert($data);
							//$data['message'] = 'Data Inserted Successfully';
							
							$this->load->view('templates/header');
			
				$this->load->view('pages/AddEvent.php');
					$this->load->view('templates/footer');
						}
		}

		public function modify($id){

						
						$this->load->helper(array('form','url'));
						$this->load->library('form_validation');
						$id=$this->input->get('ID');
						var_dump($id);
						$data['data']=$this->insert_model->getaRecords($id);
						print_r($data);

					
					
						$this->load->view('pages/modify.php',array("listofevents" => $data));
						   
							
							
						
				}	

				public function update_record(){
						$id=$this->input->get('ID');
						var_dump($id);
					$data = array(
							'ID' => $this->input->post('eid'),
							'details' => $this->input->post('fname'),
							'place' => $this->input->post('place'),
							
							'dateof' => $this->input->post('dat'),
							
							
							);

						$this->insert_model->updateuserid($data,$id);

				}

				
					
		}


?>