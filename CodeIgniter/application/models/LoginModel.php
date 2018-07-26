<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class LoginModel extends CI_Model
	{
		function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		//Check user login
		function validate()
		{
			// Post
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			
			// SQL Query
			$this->db->select("*");
			$this->db->from('tbl_users');
			$this->db->where('Username', $username);
			$this->db->where('Password', $password);
			$query = $this->db->get();
			
			// Check for results
			if($query->num_rows() == 1)
			{
				redirect('Home');
				// If there is a user, then create session data
				$row = $query->row();
				$data = array(
						'Username' => $row->Username,
						'DName' => $row->Display_Name,
						'NRIC' => $row->NRIC,
						'Mobile' => $row->Mobile_No,
						'Points' => $row->Points,
						'validated' => true
						);
				$this->session->set_userdata($data);
				return true;
			}
			// If the previous process did not validate
			// then return false.
			return false;
		}
	}
?>