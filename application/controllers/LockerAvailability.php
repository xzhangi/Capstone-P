<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->check_session();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('LockerModel');
			//Call any required model functions
			$alllockers = $this->LockerModel->get_locker_list_available_all();
			$data['availablelockerlist'] = $alllockers;
			//Load the view
			$this->load->view('User-Home', $data);
		} 

		public function __construct()
		{	
			parent::__construct();
      
		}
    
		public function index() {
			$this->load->view('retrieve');
		}
    
		public function retrieve() {
			$this->load->model('Retrieve_model');
			$data['tbl_ewallet'] = $this->Retrieve_model->retrieve_amount();
			$this->load->view('retrieve',$data);
		}
	}
	
	// Model
	class Retrieve_model extends CI_Model {
   
   function retrieve_amount(){ 
       $query = $this->db->get('tbl_ewallet');
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
   }
 }
?>