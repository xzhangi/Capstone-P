<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UpdateAccount extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('form_validation');
			$this->load->model('UpdateAccountModel');
		}
		
		public function index()
		{
			// Load model
			$this->load->model('UpdateAccountModel');
			//Call any required model functions
			$userdata = $this->UpdateAccountModel->get_user_record();
			$data['userdata'] = $userdata;
			//Load the view
			$this->load->view('updateaccount', $data);
		}
		
		public function GetAccountDetails($username)
		{
			//Call any required model functions
			$data['Userdata'] = $this->UpdateAccountModel->get_user_record($username);
			//validation conditions
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('name', 'Name' ,'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('nric', 'Nric', 'required');
			$this->form_validation->set_rules('mobile', 'MobileNumber', 'required');
			
			//if above is successful, load view updateaccount
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('updateaccount', $data);
			}
			else
			{	
				//post the fields into the edit account textboxes
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$nric = $this->input->post('nric');
				$mobile = $this->input->post('mobile');
				
				//which specific record to update
				if ($this->UpdateAccountModel->update($username, $name, $email, $nric, $mobile)) {
					redirect('adminhome');
				}					
				
			}
		}
		
		public function dashboard()
		{
			$this->load->view('Dashboard');
		}
	}
?>