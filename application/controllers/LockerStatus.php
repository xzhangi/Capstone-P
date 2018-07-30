<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LockerStatus extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('AdminModel');
			//Call any required model functions
			$data['lockerlist'] = $this->AdminModel->GenerateLockerList();
			//Load the view
			$this->load->view('Admin/AllLockerStatus', $data);
		}
		
/* 		public function dashboard()
		{
			$this->load->view('Dashboard');
		} */
	}
?>