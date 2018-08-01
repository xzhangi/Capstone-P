<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LockerSize extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('AdminModel');
			//Call any required model functions
			$data['lockersizelist'] = $this->AdminModel->Get_Lockersize_List();
			//Load the view
			$this->load->view('Admin/LockerSize', $data);
		}

		

		}
?>