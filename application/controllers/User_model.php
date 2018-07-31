<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(				
              'adminNo' => $this->input->post('adminNo'),
			   'phoneNo' => $this->input->post('phoneNo'),
                'password' => $enc_password
			);

			// Insert user
			return $this->db->insert('tbl_stud_user', $data);
		}


		// Check username exists
		public function check_adminNo_exists($adminNo){
			$query = $this->db->get_where('tbl_stud_user', array('adminNo' => $adminNo));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

	}