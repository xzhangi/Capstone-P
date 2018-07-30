<?php
	class CreateAdminModel extends CI_Model{

		public function register($enc_password){
			// User data array
			$data = array(			
				'Username' => $this->input->post('username'), //Front take from DB Column name, back taake from Controller
				'Display_Name' => $this->input->post('name'),
				'NRIC' => $this->input->post('nric'),
				'Email' => $this->input->post('email'),
				'Mobile_No' => $this->input->post('mobile'),
				'Password' => $enc_password	
			);

			// Insert user
			return $this->db->insert('tbl_users', $data);
		}

		// Check username exists
		public function check_nric_exists($nric){
			$query = $this->db->get_where('tbl_users', array('nric' => $nric));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}