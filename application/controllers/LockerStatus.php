<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LockerStatus extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
		}
		 
		public function index()
		{
			//Call any required model functions
			$data['lockerlist'] = $this->AdminModel->GenerateLockerList();
			//Load the view
			$this->load->view('Admin/AllLockerStatus', $data);
		}
		public function UpdateLockerStatus($locker_id)
		{	
				//which specific record to update
				if ($this->AdminModel->update_locker_status($locker_id)) {
					redirect('LockerStatus');
				}					
				
			}
		}
		
/* 		public function dashboard()
		{
			$this->load->view('Dashboard');
		} */
	
?>