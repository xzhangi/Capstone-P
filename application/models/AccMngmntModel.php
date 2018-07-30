<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class AccMngmntModel extends CI_Model
	{
		public function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		//Get all lockers (whether available or not)
		function get_locker_list_all()
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
		
		//Get only lockers that are available
		function get_locker_list_available()
		{
			$this->db->select('ID', 'Name');
			$this->db->from('tbl_locker');
			$this->db->where('Is_Available', 1);
			$this->db->where('Is_Active', 1);
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->LockerID->$result[$i]->ID;
				$list[$i]->Name->$result[$i]->Name;
			}
			
			return $list;
		}
	}
?>