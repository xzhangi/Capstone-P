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
			$this->load->model('AdminModel');
			//Call any required model functions
			$data['userlist'] = $this->AdminModel->Get_User_List();
			//Load the view
			$this->load->view('Admin/AccountManagement', $data);
		}
	}
?>