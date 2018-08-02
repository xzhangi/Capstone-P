<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	
	class UserModel extends CI_Model
	{
		function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}

		// Registration
		public function register($enc_password){
			// User data array
			$data = array(			
				'Username' => $this->input->post('newUser'), //Front take from DB Column name, back taake from Controller
				'NRIC' => $this->input->post('newNRIC'),
				'Display_Name' => $this->input->post('newName'),
				'Email' => $this->input->post('newEmail'),
				'Mobile_No' => $this->input->post('newPhone'),
				'Password' => $enc_password,
				'Is_Active' => true,
				'Is_Admin' => false
			);

			// Insert user
			$this->db->insert('tbl_users', $data);

			// Create eWallet for user
			$walletdata = array(
				'Username' => $this->input->post('newUser'),
				'Balance' => '0',
			);

			return $this->db->insert('tbl_ewallet', $walletdata);
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
		
		//Check user login
		function validate()
		{
			// Post
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			
			// SQL Query
			$md5pass = md5($password);
			$this->db->select('*');
			$this->db->from('tbl_users');
			$this->db->where('Username', $username);
			$this->db->where('Password', $md5pass);
			$query = $this->db->get();
			
			// Check for results
			if($query->num_rows() == 1)
			{
				$row = $query->row();
				// Check if account is active
				if ($row->Is_Active) {
					// If there is a user, then create session data
					$row = $query->row();
					$data = array(
							'Username' => $row->Username,
							'DName' => $row->Display_Name,
							'NRIC' => $row->NRIC,
							'Mobile' => $row->Mobile_No,
							'Points' => $row->Points,
							'Is_Active' => $row->Is_Active,
							'Is_Admin' => $row->Is_Admin,
							'validated' => true
							);
					$this->session->set_userdata($data);
					return true;
				}
				else {
					$row = $query->row();
					$this->session->set_userdata('Is_Active', true);

					return false;
				}
			}
			// If the previous process did not validate
			// then return false.
			return false;
		}
	}
?>