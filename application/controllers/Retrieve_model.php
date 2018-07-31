<?php 
 class Retrieve_model extends CI_Model {
	 
	public function retrieve_amount($username){ 
			$this->db->select("*");
			$this->db->from('tbl_ewallet');
			$this->db->join('tbl_locker_rental', 'tbl_locker_rental.Rented_by = tbl_ewallet.Username', 'inner');
			$this->db->where('tbl_ewallet.username', $username);
			$query = $this->db->get();
			$result = $query->result();
			
			return $result[0]->Amount;
			
			//get the current amount
	 }
	 	 
		 // Logic calculation
	 public function getTimeRented($username) { 
			$this->db->select("Time_Rented");
			$this->db->from('tbl_locker_rental');
			$this->db->where('tbl_locker_rental.Rented_by	', $username);
			$query = $this->db->get();
			$result = $query->result();
			
			return $result;
			//Get the time rented
	 }
	 
	 
	 
	 
	 
	 
	 public function price($username) {
		 $this ->db->select("Price");
		 $this->db->from('tbl_locker_rental_type');
		 $this->db->join('tbl_locker_rental', 'tbl_locker_rental_type.Rental_Type_ID = tbl_locker_rental.Rental_Type', 'inner');
		 $this->db->where('tbl_locker_rental.Rented_by =', $username);
		 $query = $this->db->get();
		 $result = $query->result();
			
			return $result;
			//Get the price
		 
	 }
	 //Price going to be deducted
	 public function priceToDeduct($username)
	 {
		 $timeRented = $this->Retrieve_model->getTimeRented($username);
		 $time = $timeRented[0]->Time_Rented;
		 $prices = $this->Retrieve_model->price($username);
		 $price = $prices[0]->Price;
		 $priceToBeDeducted = $time*$price;	
		
		return $priceToBeDeducted;
	 }
	 
	  public function updated_price($username, $finalAmt) {
		$this->db->select('Rented_by');
		$this->db->from('tbl_ewallet');
		$this->db->where('Username', $username);
		$query = $this->db->get('tbl_locker_rental');
		
		
	//	if (!empty($query->result_array())){
		//	 $priceToDeduct = $this->Retrieve_model->priceToDeduct($username);
			// $currentAmt = $this->Retrieve_model->retrieve_amount($username);
			 
			 
		//	 $finalAmt = $currentAmt - $priceToDeduct;
		//	 $priceToBeUpdatedArray = array('Amount' => $$finalAmt);
		//	 $this->db->where('Username', $username);
		//	 $this->db->update('tbl_ewallet', $finalAmt);
		//	 $query = $this->db->get();
		//	 $result = $query->result();
			
			 return $finalAmt;
			 
			 
			// $this->db->set('paid', 1);
			// $this->db->where('Username', $username);
			// $this->db->update('tbl_locker_rental');
		 }
	}
	 //
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