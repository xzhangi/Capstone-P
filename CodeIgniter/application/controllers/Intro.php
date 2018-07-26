<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Intro extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->database();
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