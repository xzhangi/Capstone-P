<?php

class CreateAdmin extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$this->load->helper('html');
			
			$this->load->model('AdminModel');
		}
		
		// This method initializes the validation class and loads the form helper and URL helper used by view files
        public function register() 
        {
			//$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('name', 'Name');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('nric', 'Nric', 'required');
			$this->form_validation->set_rules('mobile', 'MobileNumber', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('Admin/Create');
			}
			else
			{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->AdminModel->register($enc_password);
					
				redirect('accountmanagement');
			}
        }
		
		public function username_check($str)
        {
			if ($str == 'test')
			{
					$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
					return FALSE;
			}
			else
			{
					return TRUE;
			}
        }
		
				// Check if username exists
		public function check_nric_exists($nric)
		{
			$this->form_validation->set_message('check_nric_exists', 'That NRIC already exists. Please choose a different one');
			if($this->AdminModel->check_nric_exists($nric))
			{
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email)
		{
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->AdminModel->check_email_exists($email))
			{
				return true;
			} else {
				return false;
			}
		}
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'The Username already exists.');
			if($this->AdminModel->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}
		
		public function create_admintry() 
		{
			 $this->load->view('Admin/Create');
		}
}		