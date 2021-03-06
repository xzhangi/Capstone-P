<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class AdminModel extends CI_Model
	{
		public function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		// Get all users from user table
		function get_user_list()
		{
			$this->db->select('*');
			$this->db->from('tbl_users');			
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Username = $result[$i]->Username;
				$list[$i]->NRIC = $result[$i]->NRIC;
				$list[$i]->Display_Name = $result[$i]->Display_Name;
				$list[$i]->Email = $result[$i]->Email;
				$list[$i]->Mobile_No = $result[$i]->Mobile_No;
				$list[$i]->Create_Time = $result[$i]->Create_Time;
				$list[$i]->Points = $result[$i]->Points;
				$list[$i]->Is_Active = $result[$i]->Is_Active;
				$list[$i]->Is_Admin = $result[$i]->Is_Admin;

			}
			
			return $list;
		}
		
		// Get all reports from report table
		function get_report_list()
		{
			$this->db->select('*');
			$this->db->from('tbl_reports');			
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->ID = $result[$i]->ID;
				$list[$i]->Report_Title = $result[$i]->Report_Title;
				$list[$i]->Report_Details = $result[$i]->Report_Details;
				$list[$i]->Username = $result[$i]->Username;
				$list[$i]->Created_Date = $result[$i]->Created_Date;
				$list[$i]->Is_Deleted = $result[$i]->Is_Deleted;

			}
			
			return $list;
		}
		
		// Get all lockers from locker location table
		function get_lockerlocation_list()
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_location');			
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Location_ID = $result[$i]->Location_ID;
				$list[$i]->Name = $result[$i]->Name;
				$list[$i]->Remarks = $result[$i]->Remarks;
				$list[$i]->Is_Active = $result[$i]->Is_Active;
				$list[$i]->Created_Date = $result[$i]->Created_Date;

			}
			
			return $list;
		}
		
		// Get all lockers size from locker size table
		function get_lockersize_list()
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_size');			
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Locker_Size_ID = $result[$i]->Locker_Size_ID;
				$list[$i]->Name = $result[$i]->Name;
			}
			
			return $list;
		}
		function get_all_transactions()
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_rental');			
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Rent_ID = $result[$i]->Rent_ID;
				$list[$i]->Rent_From_Date = $result[$i]->Rent_From_Date;
				$list[$i]->Rent_To_Date = $result[$i]->Rent_To_Date;
				$list[$i]->Rented_By = $result[$i]->Username;
				$list[$i]->Rental_Type = $result[$i]->Rental_Type;
				$list[$i]->Creation_Date = $result[$i]->Creation_Date;
				$list[$i]->Is_Active = $result[$i]->Is_Active;
				$list[$i]->Points_Obtained = $result[$i]->Points_Obtained;
			}
			
			return $list;
		}
		
		//Function to generate locker list for admin panel
		function GenerateLockerList()
		{
			$this->db->select('*');
			$this->db->from('tbl_locker');
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Locker_ID = $result[$i]->ID;
				$list[$i]->Location_ID = $result[$i]->Location_ID;
				$list[$i]->Locker_Size_ID = $result[$i]->Locker_Size_ID;
				$list[$i]->Name = $result[$i]->Name;
				$list[$i]->Desc = $result[$i]->Desc;
				$list[$i]->Remarks = $result[$i]->Remarks;
				$list[$i]->Is_Active = $result[$i]->Is_Active;
				$list[$i]->Is_Available = $result[$i]->Is_Available;
				$list[$i]->Created_By = $result[$i]->Created_By;
				$list[$i]->Created_Date = $result[$i]->Created_Date;

			}
			return $list;
		}
		
		// Registration function (Add new user)
		public function register($enc_password)
		{
			// User data array
			$data = array(			
				'Username' => $this->input->post('username'), // Front take from DB Column name, back take from Controller
				'Display_Name' => $this->input->post('name'),
				'NRIC' => $this->input->post('nric'),
				'Email' => $this->input->post('email'),
				'Mobile_No' => $this->input->post('mobile'),
				'Password' => $enc_password	
			);

			// Insert user
			return $this->db->insert('tbl_users', $data);
		}
		
			// Check if username exists in DB
		public function check_username_exists($username)
		{
			$query = $this->db->get_where('tbl_users', array('username' => $username));
			if(empty($query->row_array()))
			{
				return true;
			} else {
				return false;
			}
		}
		
		// Check if nric exists in DB
		public function check_nric_exists($nric)
		{
			$query = $this->db->get_where('tbl_users', array('nric' => $nric));
			if(empty($query->row_array()))
			{
				return true;
			} else {
				return false;
			}
		}
		
		// Check if email exists in DB
		public function check_email_exists($email)
		{
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array()))
			{
				return true;
			} else {
				return false;
			}
		}
		
		//fetch user record by username
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
		
		public function update_locker_status($lockerid)
		{
			$this->db->select('Is_Active');
			$this->db->from('tbl_locker');
			$this->db->where('ID', $lockerid);
			$query = $this->db->get();
			$result = $query->result();
			
			$result[0]->Is_Active = !$result[0]->Is_Active;
			
			$data = array('Is_Active' => $result[0]->Is_Active);
			$this->db->where('ID', $lockerid);
			return $this->db->update('tbl_locker', $data);
		}
		
		//update user record
		public function update_user_record($username, $name, $email, $nric, $mobile){
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
		
		
			$query = $this->db->get_where('tbl_users', array('Username' => $username));
			if(empty($query->row_array())) {
				return true;
			}
			else {
				return false;
			}
			
			
		}
		
		public function get_other_tables($username) {
			//$user = $this->AdminModel->get_user_record($Username);
			$this->db->select('Name');
			$this->db->from('tbl_locker_rental');
			$this->db->join('tbl_locker', 'tbl_locker_rental.Locker_ID = tbl_locker.ID', 'inner');
			$this->db->where('tbl_locker_rental.Username', 'Admin');
			$query = $this->db->get();
			$result = $query->result();
			
			return $result;
			
		}
	}
?>