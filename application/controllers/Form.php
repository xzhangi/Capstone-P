<?php

class Form extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$this->load->helper('html');
			
			$this->load->model('guest_model');
		}

        public function register() // This method initializes the validation class and loads the form helper and URL helper used by view files
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
				
				$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
				$this->form_validation->set_rules('name', 'Name');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
				$this->form_validation->set_rules('nric', 'Nric', 'required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('phone', 'Phone', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('Intro');
                }
                else
                {
					// Encrypt password
					$enc_password = md5($this->input->post('password'));
                    $this->guest_model->register($enc_password);
					// $this->load->model('guest_model');
						
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
		public function check_nric_exists($nric){
			$this->form_validation->set_message('check_nric_exists', 'That NRIC already exists. Please choose a different one');
			if($this->guest_model->check_nric_exists($nric)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
}		