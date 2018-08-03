<?php 
 class Retrieve_model extends CI_Model {
	 
	 function __construct() 
	{
		// Call the Model Constructor
		parent::__construct();
	}
	 
	public function retrieve_amount($username){ 
			$this->db->select("Balance");
			$this->db->from('tbl_ewallet');
			$this->db->join('tbl_locker_rental', 'tbl_locker_rental.Username = tbl_ewallet.Username', 'inner');
			$this->db->where('tbl_ewallet.username', $username);
			$query = $this->db->get();
			$result = $query->result();
			
			if(!isset($result[0])) {
				return false;
			}
			else {
			return $result[0]->Balance;
			//Get the time rented
			};
			
			//get the current amount
	 }
	 public function getTimeFrom($username) {
		 $this->db->select("Rent_From_Date");
		 $this->db->from('tbl_locker_rental');
		 $this->db->where('Username', $username);
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result[0]->Rent_From_Date;
	 }
	 
	 public function getTimeTo($username) {
		 $this->db->select('Rent_To_Date');
		 $this->db->from('tbl_locker_rental');
		 $this->db->where('Username', $username);
		 
		 $query = $this->db->get();
		 $result = $query->result();
		 
		 if(!isset($result[0])) {
				return false;
			}
			else {
			return $result[0]->Rent_To_Date;
			//Get the time rented
			}
		 
	 }
	 
	 public function getTimeRented($username) { 
			$this ->db->select("Time_Rented");
			$this->db->from('tbl_locker_rental');
			$this->db->where('Paid', false);
			$this->db->where('Username', $username);
			
			$query = $this->db->get();
			$result = $query->result();
			
			if(!isset($result[0])) {
				return false;
			}
			
			else {
			return $result[0]->Time_Rented;
			//Get the time rented
			}
			
			
			
		//	$interval = $timeFrom->diff($timeTo);
		//	$hours=$interval->format('%h');
		//	$minutes= $interval->format('%i');
			
		//	$Time_Rented = $timeTo - $timeFrom;
			
		//	if(!isset($result[0])) {
			//	return false;
		//	}
		//	else {
		//	return $result[0]->Time_Rented;
			//Get the time rented
		//	}
	 }
	 
	  public function price($username) {
	  	//per minute rental
		 $this->db->select("Price");
		 $this->db->from('tbl_locker_rental_type');
		 $this->db->join('tbl_locker_rental', 'tbl_locker_rental_type.Rental_Type_ID = tbl_locker_rental.Rental_Type', 'inner');
		 $this->db->where('tbl_locker_rental.Paid', '0');
		 $this->db->where('tbl_locker_rental_type.Rental_Type_ID <', '4');
		 $this->db->where('tbl_locker_rental.Username', $username);
		 $query = $this->db->get();
		 $result = $query->result();

		 
		 if(!isset($result[0])) {
				return false;
			}
			else {
			return $result[0]->Price;
			}
		
		//Get the price
		 
	 }
	 
	  //Price going to be deducted
	 public function priceToDeduct($username)
	 {
		 $timeRented = $this->Retrieve_model->getTimeRented($username);
		 $price = $this->Retrieve_model->price($username);

		 $this->db->select("Rental_Type");
		 $this->db->from('tbl_locker_rental');
		 $this->db->where('tbl_locker_rental.Is_Active', '1');
		 $this->db->where('tbl_locker_rental.Username', $username);
		 $query = $this->db->get();
		 $result = $query->result();

		 //Check booking type (minute)
		 if ($result[0]->Rental_Type < 4)
		 {
		 	$priceToBeDeducted = $timeRented * $price;
		 }
		 else
		 {
		 	$priceToBeDeducted = $result[0]->Rental_Type * 10;
		 }
		
		return $priceToBeDeducted;
	 }
	 
	 
	 
	   public function updated_price($username) {
		   
		 
		$query = $this->db->get_where('tbl_locker_rental', array('Paid' => 0));	
		 if(!isset($query))	{
			 $result = $this->db->get_where('tbl_ewallet', array('Username' => $username));	
			 return $result;
		 }
		 
		 else {
		$currentAmount = $this->Retrieve_model->retrieve_amount($username);
		$priceToDeductNow = $this->Retrieve_model->priceToDeduct($username);
		$updatedAmt = $currentAmount - $priceToDeductNow;
		//Update ewallet
		$this->db->set('Balance', $updatedAmt);
		$this->db->where('Username', $username);
		$this->db->update('tbl_ewallet');
		
		//Update total charge to db
		$this->db->set('Total_Charge', $priceToDeductNow);
		$this->db->where('Username', $username);
		$this->db->where('Is_Active', true);
		$this->db->update('tbl_locker_rental');

		//Set user paid to true
		$this->db->set('Paid', true);
		$this->db->where('Username', $username);
		$this->db->where('Is_Active', true);
		$this->db->update('tbl_locker_rental');

		//Close the transaction
		$this->db->set('Is_Active', false);
		$this->db->where('Username', $username);
		$this->db->where('Is_Active', true);
		$this->db->update('tbl_locker_rental');

		return $updatedAmt;
		
		}
	
	 //
 }
	 
	 
 }
 //<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//class Gallery_model extends CI_Model {
  //  function get_images() {
     //   $query = $this->db->get('gallery');
      //  if($query->num_rows() > 0){
         //   $result = $query->result_array();
          //  return $result;
       // }else{
       //     return false;
       // }
  //  }
//}