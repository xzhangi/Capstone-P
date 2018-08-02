<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class eWalletModel extends CI_Model
	{
		function __construct() 
		{
			// Call the Model Constructor
			parent::__construct();
		}
		
		public function retrieve_balance($username)
		{		
			$this->db->select('Balance'); //Select what
			$this->db->from('tbl_ewallet'); //From which table
			$this->db->where('Username', $username); //Where?
			$query = $this->db->get();

				if($query->num_rows() == 1)
				{
					$result = $query->row();
					$data = $result->Balance;
					return $data;
				} else 
				{
					$data = 'wallet not found!';
					return $data;
				}
		}
		
		public function add_balance($username, $top_up_amount)
		{
			$currBalance = $this->retrieve_balance($username);
			$top_up_amount += $currBalance;
			$topUpArray = array('Balance' => $top_up_amount); // getting the top up amount and putting it in an array
			$this->db->where('Username', $username); //Where?
			$this->db->update('tbl_ewallet', $topUpArray); //Select what
			return true;
		}

		public function deduct_balance($username, $deductamount)
		{
			$currBalance = $this->retrieve_balance($username);
			$final_amount = $currBalance - $deductamount;
			$data = array('Balance' => $final_amount);
			$this->db->where('Username', $username);
			$this->db->update('tbl_ewallet', $data);
		}

		public function calculate_charges($fromdate, $todate, $rentaltype)
		{
			//Get price based on rental type (size and duration)
			$this->db->select('Price');
			$this->db->from('tbl_locker_rental_type');
			$this->db->where('Rental_Type_ID', $rentaltype);
			$query = $this->db->get();
			$result = $query->result();

			$finalcharge = 0;

			//Per minute rental
			if($rentaltype == 1 || $rentaltype == 2 || $rentaltype == 3)
			{
				//Calculate total time

			}
			else
			{
				//Flat charge, no need to calulate
				if ($rentaltype == 4 || $rentaltype == 5 || $rentaltype == 6)
			}

		}

		public function 
	}
?>