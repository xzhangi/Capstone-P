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
		
		function Book_Locker()
		{
			$pincode = '';
			// Generate pin or not
			if ($this->input->post('autogeneratepin'))
			{
				$pincode = $this->generatePIN();
			}
			else
			{
				$pincode = $this->input->post('pincode');
			}
			
			// Get Post
			$rentaldata = array(
                //'Rent_From_Date' => @date('Y-m-d H:i', @strtotime($this->input->post('registeredDate'))), //need to change to date time
				'Rent_From_Date' => @date('Y-m-d H:i'),
				'Locker_ID' => $this->input->post('lockerselected'),
                'Rented_By' => $this->session->userdata('Username'),
                'Rental_Type' => $this->input->post('rentaltype'),
                'Creation_Date' => @date('Y-m-d H:i'),
				'Is_Active' => true,
				'Pin_Code' => $pincode,
			);
			//Insert new rent into locker rental table
			$this->db->insert('tbl_locker_rental', $rentaldata);
			
			//Update locker status
			$this->UpdateLockerStatus($this->input->post('lockerselected'), false);
		}
		
		private function generatePIN($digits = 6)
		{
			$i = 0; //counter
			$pin = ""; //our default pin is blank.
			while($i < $digits){
				//generate a random number between 0 and 9.
				$pin .= mt_rand(0, 9);
				$i++;
			}
			return $pin;
		}
		
		public function UpdateLockerStatus($LockerID, $Booked) 
		{
			$LockerStatus = array('Is_Available' => $Booked);
			$this->db->where('ID', $LockerID);
			$this->db->update('tbl_locker', $LockerStatus);
		}
		
		//Check if user booked a locker
		public function CheckLockerBooking() {
			//Select query from tbl_locker_rental where rented_by is session's username
			//And rental is active
			$this->db->select('*');
			$this->db->from('tbl_locker_rental');
			$this->db->where('Rented_By', $this->session->userdata('Username'));
			$this->db->where('Is_Active', true);
			$query = $this->db->get();
			
			// If record exists (user rented locker)
			if($query->num_rows() == 1)
			{	
				$row = $query->row();
				$data = array(
							'Rented' => true,
							'Locker_ID' => $row->Locker_ID,
							'Rent_From_Date' => $row->Rent_From_Date,
							'Rent_To_Date' => $row->Rent_To_Date,
							'Rented_By' => $row->Rented_By,
							'Rental_Type' => $row->Rental_Type,
							'Pin_Code' => $row->Pin_Code,
						);
				return $data;
			}
			else
			{
				return false;
			}
			return false;
		}
		
		//Get details regarding locker booking
		public function GetAllLockerBookingRecord() 
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_rental');
			$this->db->where('Rented_By', $this->session->userdata('Username'));
			$query = $this->db->get();
			print_r($query);
			// Record exists
			$result = $query->result();
			$list = Array();
			
			if ($query->num_rows() > 0) {
				for ($i = 0; $i < count($result); $i++)
				{
					$list[$i] = (object)NULL;
					$list[$i]->Locker_ID = $result[$i]->Locker_ID;
					$list[$i]->Rent_From_Date = $result[$i]->Rent_From_Date;
					$list[$i]->Rent_To_Date = $result[$i]->Rent_To_Date;
					$list[$i]->Rented_By = $result[$i]->Rented_By;
					$list[$i]->Rental_Type = $result[$i]->Rental_Type;
					$list[$i]->Pin_Code = $result[$i]->Pin_Code;
				}
				return $list;
			}
			
			return false;
		}
	}
?>