<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->check_session();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('LockerModel');
			//Call any required model functions
			$alllockers = $this->LockerModel->get_locker_list_available_all();
			$data['availablelockerlist'] = $alllockers;
			//Load the view
			$this->load->view('User-Home', $data);
		} 
		
		public function do_logout() {
			$this->session->sess_destroy();
			redirect('Intro');
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
						//redirect('Home');
					}
				}
			}
			else {
				redirect('Intro');
			}
		}
	}
?>