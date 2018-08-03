<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class LockerModel extends CI_Model
	{
		function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
			
			// Set timezone
			date_default_timezone_set('Asia/Singapore');
		}
		
		//Get all lockers (whether available or not)
		function Get_Locker_List_All()
		{
			$this->db->select('ID');
			$this->db->select('Locker_Size_ID');
			$this->db->select('Name');
			$this->db->select('Is_Available');
			$this->db->from('tbl_locker');
			$this->db->where('Is_Active', 1);
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->LockerID = $result[$i]->ID;
				$list[$i]->Name = $result[$i]->Name;
				$list[$i]->Locker_Size_ID = $result[$i]->Locker_Size_ID;
				$list[$i]->Is_Available = $result[$i]->Is_Available;
			}
			
			return $list;
		}
		
		//Get only lockers that are available
		function Get_Locker_List_Available_All()
		{
			$this->db->select('ID');
			$this->db->select('Locker_Size_ID');
			$this->db->select('Name');
			$this->db->select('Is_Available');
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
				$list[$i]->Is_Available = $result[$i]->Is_Available;
			}
			
			return $list;
		}
		
		function Get_Locker_Available($size)
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

		function Get_Locker_Rental_Type()
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_rental_type');
			$query = $this->db->get();
			$result = $query->result();
			$list = Array();
			
			for ($i = 0; $i < count($result); $i++)
			{
				$list[$i] = (object)NULL;
				$list[$i]->Rental_Type_ID = $result[$i]->Rental_Type_ID;
				$list[$i]->Locker_Size_ID = $result[$i]->Locker_Size_ID;
				$list[$i]->Name = $result[$i]->Name;
				$list[$i]->Price = $result[$i]->Price;
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
				'Rent_From_Date' => @date('Y-m-d H:i'),
				'Rental_Type' => $this->input->post('rentaltypeselected'),
				'Locker_ID' => $this->input->post('lockerselected'),
                'Username' => $this->session->userdata('Username'),
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
			do {
				while($i < $digits){
					//generate a random number between 0 and 9.
					$pin .= mt_rand(0, 9);
					$i++;
				}
			} while (strlen($pin) < 6); //Ensure that pin is 6 digits
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
			$this->db->where('Username', $this->session->userdata('Username'));
			$this->db->where('Is_Active', true);
			$query = $this->db->get();
			
			// If record exists (user rented locker)
			if($query->num_rows() == 1)
			{	
				$row = $query->row();
				if ($row->Show_Pin)
				{
					$data = array(
							'Rented' => true,
							'Locker_ID' => $row->Locker_ID,
							'Rent_From_Date' => substr($row->Rent_From_Date, 0, -3), 
							'Rent_To_Date' => substr($row->Rent_To_Date, 0, -3),
							'Rented_By' => $row->Username,
							'Rental_Type' => $row->Rental_Type,
							'Pin_Code' => $row->Pin_Code,
							'Paid' => $row->Paid,
							'Locker_Unlocked' => $row->Locker_Unlocked
							
						);
				}
				else 
				{
					$data = array(
							'Rented' => true,
							'Locker_ID' => $row->Locker_ID,
							'Rent_From_Date' => substr($row->Rent_From_Date, 0, -3), 
							'Rent_To_Date' => substr($row->Rent_To_Date, 0, -3),
							'Rented_By' => $row->Username,
							'Rental_Type' => $row->Rental_Type,
							'Pin_Code' => '******',
							'Paid' => $row->Paid,
							'Locker_Unlocked' => $row->Locker_Unlocked
							
						);
				}

				return $data;
			}
			else
			{
				return false;
			}
			return false;
		}
		
		//Get all details regarding locker booking
		public function GetAllLockerBookingRecord() 
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_rental');
			$this->db->where('Username', $this->session->userdata('Username'));
			$query = $this->db->get();
			// Record exists
			$result = $query->result();
			$list = Array();
			
			if ($query->num_rows() > 0) {
				for ($i = 0; $i < count($result); $i++)
				{
					$list[$i] = (object)NULL;
					$list[$i]->Locker_ID = $result[$i]->Locker_ID;
					$list[$i]->Rent_From_Date = substr($result[$i]->Rent_From_Date, 0, -3);
					$list[$i]->Rent_To_Date = substr($result[$i]->Rent_To_Date, 0, -3);
					$list[$i]->Rented_By = $result[$i]->Username;
					$list[$i]->Rental_Type = $result[$i]->Rental_Type;
					$list[$i]->Paid = $result[$i]->Paid;
				}
				return $list;
			}
			
			return false;
		}

		//Get all details regarding locker booking
		public function GetPastLockerTransactions() 
		{
			$this->db->select('*');
			$this->db->from('tbl_locker_rental');
			$this->db->where('Username', $this->session->userdata('Username'));
			$this->db->where('Is_Active', false); // Not active transaction
			$query = $this->db->get();
			// Record exists
			$result = $query->result();
			$list = Array();
			
			// There are past transactions
			if ($query->num_rows() > 0) {
				for ($i = 0; $i < count($result); $i++)
				{
					$list[$i] = (object)NULL;
					$list[$i]->Locker_ID = $result[$i]->Locker_ID;
					$list[$i]->Rent_From_Date = substr($result[$i]->Rent_From_Date, 0, -3);
					$list[$i]->Rent_To_Date = substr($result[$i]->Rent_To_Date, 0, -3);
					$list[$i]->Rented_By = $result[$i]->Username;
					$list[$i]->Rental_Type = $result[$i]->Rental_Type;
					$list[$i]->Paid = $result[$i]->Paid;
					$list[$i]->Has_Trans = true;
				}
				return $list;
			}
			// No past transactions
			return false;
		}
		
		//Complete current on-going booking
		public function Complete_Booking()
		{
			$this->db->select('Is_Active');
			$this->db->select('Points_Obtained');
			$this->db->from('tbl_locker_rental');
			$this->db->where('Username', $this->session->userdata('Username'));
			$this->db->where('Is_Active', true);
			$query = $this->db->get();
			
			// If record exists (user currently renting locker)
			if($query->num_rows() == 1)
			{
				$data = array(
					'Rent_To_Date' => @date('Y-m-d H:i'),
			        'Is_Active' => false
				);
				$this->db->where('Username', $this->session->userdata('Username'));
				$this->db->where('Is_Active', true);
				$this->db->update('tbl_locker_rental', $data);

				//return true;
			}
			//Update booked locker status back to available
			return $this->UpdateLockerStatus($this->input->post('lockerselected'), true);
		}

		public function Change_Pin()
		{
			$this->db->select('Is_Active');
			$this->db->from('tbl_locker_rental');
			$this->db->where('Username', $this->session->userdata('Username'));
			$this->db->where('Is_Active', true);
			$this->db->where('Pin_Code', $this->input->post('pincode_old'));
			$query = $this->db->get();
			
			// If record exists and pincode is correct (user currently renting locker)
			if($query->num_rows() == 1)
			{
				//Change pin
				$data = array(
			        'Pin_Code' => $this->input->post('pincode_confirm')
				);
				$this->db->where('Username', $this->session->userdata('Username'));
				$this->db->where('Is_Active', true);
				$this->db->where('Pin_Code', $this->input->post('pincode_old'));
				$this->db->update('tbl_locker_rental', $data);

				return true;
			}

			//Pin is incorrect
			return false;
		}

		public function Unlock_Locker()
		{
			if ($this->input->post('pincode') != '-') // unlock
			{
				// Verify pincode
				$this->db->select('Is_Active');
				$this->db->from('tbl_locker_rental');
				$this->db->where('Username', $this->session->userdata('Username'));
				$this->db->where('Is_Active', true);
				$this->db->where('Pin_Code', $this->input->post('pincode'));
				$query = $this->db->get();
				
				// If record exists and pincode is correct (user currently renting locker)
				if($query->num_rows() == 1)
				{
					// Set locker status
					$this->db->select('Locker_Unlocked');
					$this->db->from('tbl_locker_rental');
					$this->db->where('Username', $this->session->userdata('Username'));
					$this->db->where('Is_Active', true);
					$query = $this->db->get();
					$result = $query->result();

					if($query->num_rows() == 1)
					{
						//change status
						$data = array(
					        'Locker_Unlocked' => true
						);
						$this->db->where('Username', $this->session->userdata('Username'));
						$this->db->where('Is_Active', true);
						$this->db->update('tbl_locker_rental', $data);

						$msg = '<font size=2 color=red>Your locker is unlocked.</font>';
						return $msg;
					}
				}
				else //Incorrect pin 
				{
					$msg = '<font size=2 color=red>Your pin is incorrect.</font>';
							return $msg;
				}
			}
			else //lock
			{
				// Set locker status
				$this->db->select('Locker_Unlocked');
				$this->db->from('tbl_locker_rental');
				$this->db->where('Username', $this->session->userdata('Username'));
				$this->db->where('Is_Active', true);
				$query = $this->db->get();
				$result = $query->result();

				if($query->num_rows() == 1)
				{
					//change status
					$data = array(
				        'Locker_Unlocked' => false
					);
					$this->db->where('Username', $this->session->userdata('Username'));
					$this->db->where('Is_Active', true);
					$this->db->update('tbl_locker_rental', $data);

					$msg = '<font size=2 color=red>Your locker is locked.</font>';
					return $msg;
				}
			}
		}

		public function Show_Pin($show)
		{
			// Show the pin
			if ($show)
			{
				if ($this->input->post('userPass') == '-') // hide pin
				{
					// Received ------, Hide pin
					$this->db->select('Show_Pin');
					$this->db->from('tbl_locker_rental');
					$this->db->where('Username', $this->session->userdata('Username'));
					$this->db->where('Is_Active', true);
					$query = $this->db->get();
					$result = $query->result();

					// If record exists (user currently renting locker)
					if($query->num_rows() == 1)
					{
						// Hide the pin by setting Show_Pin to false
						$data = array(
					        'Show_Pin' => false
						);
						$this->db->where('Username', $this->session->userdata('Username'));
						$this->db->where('Is_Active', true);
						$this->db->update('tbl_locker_rental', $data);
					}

					return '<font size=2 color=red>Your pin has been hidden.</font>';
				}
				else 
				{
					// Verify credentials
					$this->db->select('password');
					$this->db->from('tbl_users');
					$this->db->where('Username', $this->session->userdata('Username'));
					$encryptpass = md5($this->input->post('userPass'));
					$query = $this->db->get();
					$result = $query->result();

					// Password verified
					if ($result[0]->password == $encryptpass)
					{
						$this->db->select('Show_Pin');
						$this->db->from('tbl_locker_rental');
						$this->db->where('Username', $this->session->userdata('Username'));
						$this->db->where('Is_Active', true);
						$query = $this->db->get();
						$result = $query->result();

						// If record exists (user currently renting locker)
						if($query->num_rows() == 1)
						{
							// Show the pin by setting Show_Pin to true
							$data = array(
						        'Show_Pin' => true
							);
							$this->db->where('Username', $this->session->userdata('Username'));
							$this->db->where('Is_Active', true);
							$this->db->update('tbl_locker_rental', $data);

							return '<font size=2 color=red>Your pin has been revealed.</font>';
						}
					}
					else 
					{ //Wrong password
						return '<font size=2 color=red>Your password is incorrect.</font>';
					}
				} 
			}
			else 
			{ //Hide the pin (for initial login)
				$this->db->select('Show_Pin');
				$this->db->from('tbl_locker_rental');
				$this->db->where('Username', $this->session->userdata('Username'));
				$this->db->where('Is_Active', true);
				$query = $this->db->get();
				$result = $query->result();

				// If record exists (user currently renting locker)
				if($query->num_rows() == 1)
				{
					// Hide the pin by setting Show_Pin to false
					$data = array(
				        'Show_Pin' => false,
				        'Locker_Unlocked' => false //Lock locker too
					);
					$this->db->where('Username', $this->session->userdata('Username'));
					$this->db->where('Is_Active', true);
					$this->db->update('tbl_locker_rental', $data);
				}
			}
		}
	}
?>