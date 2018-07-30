<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class UpdateAccountModel extends CI_Model
	{
		public function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
			$this->load->database();
		}
		
		//fetch student record by student no
		function get_user_record($Username)
		{
			$this->db->select('*');
			$this->db->from('tbl_users');
			$this->db->where('Username', $Username);
			$query = $this->db->get();
			

			if($query->num_rows() == 1)
			{
				$row = $query->row();
				$data = array(
						'Username' => $row->Username,
						'Display_Name' => $row->Display_Name,
						'NRIC' => $row->NRIC,
						'Mobile_No' => $row->Mobile_No,
						'Points' => $row->Points,
						'Is_Active' => $row->Is_Active,
						'Email' => $row->Email
						);
			}
			
			return $data;
		}
		
		public function update($username, $name, $email, $nric, $mobile){
			// User data array
			$data = array(			
				'Username' => $username, //Front take from DB Column name, back taake from Controller
				'Display_Name' => $name,
				'NRIC' => $nric,
				'Email' => $email,
				'Mobile_No' => $mobile
			);
			
			$this->db->where('Username', $username);

			// Insert user
			return $this->db->update('tbl_users', $data);
		}
		
		
	}
?>