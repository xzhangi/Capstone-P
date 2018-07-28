<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminHome extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('html');
			$this->load->database();
			
			$this->check_session();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('Lockermodel');
			//Call any required model functions
			$alllockers = $this->Lockermodel->get_locker_list_all();
			$data['lockerlist'] = $alllockers;
			//Load the view
			$this->load->view('Admin-Home', $data);
		}
		
		public function do_logout()
		{
			$this->session->sess_destroy();
			redirect('AdminLogin');
		}
		
		//Check if there is a valid session (redirects accordingly if there is)
		public function check_session()
		{
			//Check if is admin or not and redirect accordingly
			if ($this->session->userdata('validated')) {
				if ($this->session->userdata('Is_Admin')) {
					//redirect('AdminHome');
				}
				else {
					//Check if user account is active
					if ($this->session->userdata('Is_Active')) {
						redirect('Home');
					}
				}
			}
		}
	}
?>