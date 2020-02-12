<?php

	class user_model extends CI_Model {

		public function insert($data){

			

			 $this->db->insert('individual',$data);

		}

	}





?>