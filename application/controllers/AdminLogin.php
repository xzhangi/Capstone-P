<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminLogin extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			
			$this->check_session();
		}
		 
		public function index($msg = NULL)
		{
			$data['msg'] = $msg;
			$this->load->view('Admin-Login', $data);
		}
		
		public function processlogin()
		{
			//Load model
			$this->load->model('LoginModel');
			//Validate credentials
			$result = $this->LoginModel->validate(true);
			if (! $result) {
				//Validation fail
				$msg = '<font color=red>Invalid Admin Login and/or password.</font><br />';
				$this->index($msg);
			}
			else {
				redirect('AdminHome');
			}
		}
		
		//Exit admin login page back to intro
		public function exit_page()
		{
			redirect('Intro');
		}
		
		//Check if there is a valid session (redirects accordingly if there is)
		public function check_session()
		{
			//Check if is admin or not and redirect accordingly
			if ($this->session->userdata('validated')) {
				if ($this->session->userdata('Is_Admin')) {
					redirect('AdminHome');
				}
				else {
					//Check if user account is active
					if ($this->session->userdata('Is_Active')) {
						redirect('Home');
					}
				}
			}
		}
	}
?>