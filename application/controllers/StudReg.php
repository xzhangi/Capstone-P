<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class StudReg extends CI_Controller{
		
		
		public function __construct()
		{
			parent::__construct();
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$this->load->helper('html');
			$this->load->model('Stud_model');
		}
		
		public function index($msg = NULL)
		{
			$data['msg'] = $msg;
			$this->load->view('Intro', $data);
		}
		
		// Register user
		public function register(){
			
			$this->form_validation->set_rules('adminNo', 'AdminNo', 'required|callback_check_adminNo_exists');
			$this->form_validation->set_rules('phoneNo', 'PhoneNo', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->index();
			} else {
				
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->Stud_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('Intro');
			}
		}


		// Check if username exists
		public function check_adminNo_exists($adminNo){
			$this->form_validation->set_message('check_adminNo_exists', 'That adminNo is taken. Please choose a different one');
			
			if($this->Stud_model->check_adminNo_exists($adminNo)){
				return true;
			} else {
				return false;
			}
		}

	}