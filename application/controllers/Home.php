<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->check_isvalidated();
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
		
		private function check_isvalidated() {
			if (! $this->session->userdata('validated')) {
				redirect('Intro');
			}
		}
		
		public function do_logout() {
			$this->session->sess_destroy();
			redirect('Intro');
		}
	}
?>