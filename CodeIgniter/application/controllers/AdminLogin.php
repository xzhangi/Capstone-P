<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminLogin extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->database();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('Lockermodel');
			//Call any required model functions
			$alllockers = $this->Lockermodel->get_locker_list_all();
			$data['lockerlist'] = $alllockers;
			//Load the view
			$this->load->view('Admin-Login', $data);
		}
	}
?>