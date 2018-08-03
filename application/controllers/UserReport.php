<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UserReport extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('AdminModel');
			//Call any required model functions
			//$data[''] = $this->UserReportModel->;
			$data['reportlist'] = $this->AdminModel->get_report_list();
			//Load the view
			$this->load->view('Admin/UserReport', $data);
			//$this->load->view('Admin/UserReport');

		}
	}
?>