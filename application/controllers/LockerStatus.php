<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LockerStatus extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('LockerStatusModel');
			//Call any required model functions
			$alllockers = $this->LockerStatusModel->get_locker_list_all();
			$data['lockerlist'] = $alllockers;
			//Load the view
			$this->load->view('lockerstatus', $data);
		}
		
/* 		public function dashboard()
		{
			$this->load->view('Dashboard');
		} */
	}
?>