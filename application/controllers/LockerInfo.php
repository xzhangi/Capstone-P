<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class LockerInfo extends CI_Controller {

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
			$data['lockerlocationlist'] = $this->AdminModel->Get_Lockerlocation_List();
			//Load the view
			$this->load->view('Admin/LockerInfo', $data);
		}

		

		}
?>