<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AccountManagement extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('AccMngmntModel');
			//Call any required model functions
			$allusers = $this->AccMngmntModel->get_locker_list_all();
			$data['userlist'] = $allusers;
			//Load the view
			$this->load->view('accountmanagement', $data);
		}
		
		public function dashboard()
		{
			$this->load->view('Dashboard');
		}
	}
?>