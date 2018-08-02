<?php
	if (!defined('BASEPATH'))
		exit ('No direct script access allowed!');
	
	class eWalletModel_3 extends CI_Model
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
	}
?>