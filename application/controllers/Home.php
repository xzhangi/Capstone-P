<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->check_session();
			$this->output->enable_profiler(TRUE);
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('LockerModel');
			//Call any required model functions
			$alllockers = $this->LockerModel->get_locker_list_available_all();
			$data['availablelockerlist'] = $alllockers;
			if ($this->check_booking())
			{
				$data['bookingdetails'] = $this->get_booking_details();
			}
			else
			{
				$data['bookingdetails'] = array('Rented' => false);
			}
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
		
		//Book locker
		public function book_locker()
		{
			$this->load->model('LockerModel');
			$this->LockerModel->Book_Locker();
			redirect('Home');
		}
		
		public function check_booking()
		{
			$this->load->model('LockerModel');
			$result = $this->LockerModel->CheckLockerBooking();
			return $result;
		}
		
		public function get_booking_details()
		{
			$this->load->model('LockerModel');
			$data = $this->LockerModel->GetLockerBookingRecord();
		}
	}
?>