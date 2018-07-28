<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class LockerModel extends CI_Model
	{
		function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		//Get all lockers (whether available or not)
		function get_locker_list_all()
		{
			$this->db->select('ID');
			$this->db->select('Name');
			$this->db->from('tbl_locker');
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->LockerID = $result[$i]->ID;
				$list[$i]->Name = $result[$i]->Name;
			}
			
			return $list;
		}
		
		//Get only lockers that are available
		function get_locker_list_available_all()
		{
			$this->db->select('tbl_locker.ID');
			$this->db->select('tbl_locker.Locker_Size_ID');
			$this->db->select('tbl_locker.Name');
			$this->db->from('tbl_locker');
			$this->db->where('Is_Available', 1);
			$this->db->where('Is_Active', 1);
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->LockerID = $result[$i]->ID;
				$list[$i]->Locker_Size_ID = $result[$i]->Locker_Size_ID;
				$list[$i]->Name = $result[$i]->Name;
			}
			
			return $list;
		}
		
		/* //Get only lockers that are available
		function get_locker_list_available_all()
		{
			$this->db->select('tbl_locker.ID');
			$this->db->select('tbl_locker.Locker_Size_ID');
			$this->db->select('tbl_locker.Name');
			$this->db->select('tbl_locker_size.Name');
			$this->db->from('tbl_locker');
			$this->db->join('tbl_locker_size', 'tbl_locker.Locker_Size_ID = tbl_locker_size.Locker_Size_ID');
			$this->db->where('Is_Available', 1);
			$this->db->where('Is_Active', 1);
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->LockerID = $result[$i]->ID;
				$list[$i]->Locker_Size_ID = $result[$i]->Locker_Size_ID;
				$list[$i]->Name = $result[$i]->Name;
			}
			
			return $list;
		} */
		
		function get_locker_available($size)
		{
			$this->db->select('ID', 'Name');
			$this->db->from('tbl_locker');
			$this->db->where('Is_Available', 1);
			$this->db->where('Is_Active', 1);
			$this->db->where('Locker_Size_ID', $size);
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