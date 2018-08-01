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
			
			//Load model
			$this->load->model('UserModel');

			$this->check_session();
		}
		 
		public function index($msg = NULL)
		{
			$data['msg'] = $msg;
			$this->load->view('Intro', $data);
		}
		
		public function processlogin()
		{
			//Validate credentials
			$result = $this->UserModel->validate();
			if (! $result) {
				//Validation fail
				if ($this->session->userdata('Is_Active')) {
					$this->session->sess_destroy();
					$msg = '<font color=red>Your account is disabled, please contact the Administrator.</font><br />';
				}
				else {
					$msg = '<font color=red>Invalid username and/or password.</font><br />';
				}
				
				$this->index($msg);
			}
			else {
				$this->check_session();
			}
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
						$this->load->model('LockerModel');
						$this->LockerModel->Show_Pin(false);
						redirect('Home');
					}
				}
			}
		}
		
		public function adminlogin() 
		{
			redirect('AdminLogin');
		}
		
		// Register Guests
		public function register() // This method initializes the validation class and loads the form helper and URL helper used by view files
        {
            $this->load->library('form_validation');
			
			$this->form_validation->set_rules('newUser', 'Username', 'callback_username_check|is_unique[tbl_users.username]');
			$this->form_validation->set_rules('newName', 'Name');
			$this->form_validation->set_rules('newPass', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('newPassConfirm', 'Password Confirmation', 'trim|required|matches[newPass]');
			$this->form_validation->set_rules('newNRIC', 'Nric', 'required');
			$this->form_validation->set_rules('newEmail', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('newPhone', 'Phone', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
				// Encrypt password
				$enc_password = md5($this->input->post('newPassConfirm'));
                $this->UserModel->register($enc_password);
					
				redirect('Intro');
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
			if($this->UserModel->check_nric_exists($nric))
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
			if($this->UserModel->check_email_exists($email))
			{
				return true;
			} else {
				return false;
			}
		}
	}
?>