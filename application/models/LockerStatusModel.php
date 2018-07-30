<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class LockerStatusModel extends CI_Model
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
			$this->db->select('Location_ID');
			$this->db->select('Locker_Size_ID');
			$this->db->select('Name');
			$this->db->select('Desc');
			$this->db->select('Remarks');
			$this->db->select('Is_Active');
			$this->db->select('Is_Available');
			$this->db->select('Created_By');
			$this->db->select('Created_Date');
			$this->db->from('tbl_locker');
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
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
				$list[$i]->Location_ID->$result[$i]->Location_ID;
				$list[$i]->Locker_Size_ID->$result[$i]->Locker_Size_ID;
				$list[$i]->Name->$result[$i]->Name;
				$list[$i]->Desc->$result[$i]->Desc;
				$list[$i]->Remarks->$result[$i]->Remarks;
				$list[$i]->Is_Active->$result[$i]->Is_Active;
				$list[$i]->Is_Available->$result[$i]->Is_Available;
				$list[$i]->Created_By->$result[$i]->Created_By;
				$list[$i]->Created_Date->$result[$i]->Created_Date;
				
			}
			
			return $list;
		}
	}
?>