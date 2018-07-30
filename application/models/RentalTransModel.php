<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class RentalTransModel extends CI_Model
	{
		public function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		//Get all lockers (whether available or not)
		function get_locker_list_all()
		{
			$this->db->select('Rent_ID');
			$this->db->select('Rent_From_Date');
			$this->db->select('Rent_To_Date');
			$this->db->select('Rented_By');
			$this->db->select('Rental_Type');
			$this->db->select('Creation_Date');
			$this->db->select('Is_Active');
			$this->db->select('Points_Obtained');
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
				$list[$i]->Rented_By = $result[$i]->Rented_By;
				$list[$i]->Rented_By = $result[$i]->Rental_Type;
				$list[$i]->Rented_By = $result[$i]->Creation_Date;
				$list[$i]->Rented_By = $result[$i]->Is_Active;
				$list[$i]->Rented_By = $result[$i]->Points_Obtained;
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