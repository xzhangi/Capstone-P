<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'adminNo' => $this->input->post('adminNo'),
                'password' => $enc_password
			);

			// Insert user
			return $this->db->insert('users', $data);
		}

		// Log user in
		public function login($adminNo, $password){
			// Validate
			$this->db->where('adminNo', $adminNo);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}

		// Check username exists
		public function check_adminNo_exists($adminNo){
			$query = $this->db->get_where('users', array('adminNo' => $adminNo));
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