<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Intro extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$this->load->helper('html');
			
			$this->check_session();
		}
		 
		public function index($msg = NULL)
		{
			$data['msg'] = $msg;
			$this->load->view('Intro', $data);
		}
		
		public function processlogin()
		{
			//Load model
			$this->load->model('LoginModel');
			//Validate credentials
			$result = $this->LoginModel->validate(false);
			if (! $result) {
				//Validation fail
				$msg = '<font color=red>Invalid username and/or password.</font><br />';
				$this->index($msg);
			}
			else {
				$this->check_session();
			}
		}
		
		//Check if there is a valid session (redirect to home if there is)
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
					else { //Account is not active (blocked)
						$this->session->sess_destroy();
						$msg = '<font color=red>Your account is disabled, please contact the Administrator.</font><br />';
						$this->index($msg);
					}
					
				}
			}
		}
		
		public function adminlogin() 
		{
			redirect('AdminLogin');
		}
	}
?>