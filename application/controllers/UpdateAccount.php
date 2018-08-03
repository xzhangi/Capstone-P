<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class UpdateAccount extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->library('form_validation');

		}
		
		public function index()
		{
			//Call any required model functions
			$data['userdata'] = $this->AdminModel->get_user_record();
			//Load the view
			$this->load->view('Admin/EditAccount', $data);
		}
		
		public function GetAccountDetails($username)
		{
			//Call any required model functions
			$data['Userdata'] = $this->AdminModel->get_user_record($username);
			//validation conditions
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('name', 'Name' ,'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('nric', 'Nric', 'required');
			$this->form_validation->set_rules('mobile', 'MobileNumber', 'required');
			
			//if above is successful, load view updateaccount
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('Admin/EditAccount', $data);
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
				if ($this->AdminModel->update_user_record($username, $name, $email, $nric, $mobile)) {
					redirect('accountmanagement');
				}					
				
			}
		}

		
		public function delete_user()
		{
			
			$this->load->view('Admin/EditAccount', $data);
		}
	}
?>