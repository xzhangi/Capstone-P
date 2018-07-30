<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class UserReportModel extends CI_Model
	{
		function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		//Get all lockers (whether available or not)
		function get_locker_list_all()
		{
			$this->db->select('Username');
			$this->db->select('NRIC');
			$this->db->select('Email');
			$this->db->from('tbl_users');
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Username = $result[$i]->Username;
				$list[$i]->NRIC = $result[$i]->NRIC;
				$list[$i]->Email = $result[$i]->Email;

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