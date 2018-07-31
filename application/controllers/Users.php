<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Users extends CI_Controller{
		
		
		public function __construct()
		{
			parent::__construct();
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$this->load->helper('html');
		}
		// Register user
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('adminNo', 'AdminNo', 'required|callback_check_adminNo_exists');
			$this->form_validation->set_rules('phoneNo', 'PhoneNo', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('users/register', $data);
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('Intro');
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('adminNo');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}

		// Check if username exists
		public function check_adminNo_exists($adminNo){
			$this->form_validation->set_message('check_adminNo_exists', 'That adminNo is taken. Please choose a different one');
			if($this->user_model->check_adminNo_exists($adminNo)){
				return true;
			} else {
				return false;
			}
		}

	}