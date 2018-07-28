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
			$result = $this->LoginModel->validate();
			if (! $result) {
				//Validation fail
				$msg = '<font color=red>Invalid username and/or password.</font><br />';
				$this->index($msg);
			}
			else {
				redirect('Home');
			}
		}
		
		public function adminlogin() 
		{
			redirect('AdminLogin');
		}
	}
?>