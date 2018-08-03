<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->check_session();
			//Load locker model
			$this->load->model('LockerModel');
			$this->load->model('updatenotificationmodel');
			//$this->output->enable_profiler(TRUE);
		}
		 
		public function index($pinErrMsg = NULL, $showPinMsg = NULL , $unlockMsg = NULL)
		{
			// Load model
			//Call any required model functions
			$data['availablelockerlist'] = $this->LockerModel->Get_Locker_List_All();
			$data['availablerentaltype'] = $this->LockerModel->Get_Locker_Rental_Type();
			$data['pastlockertransactionslist'] = $this->LockerModel->GetPastLockerTransactions();
			if ($this->check_current_booking())
			{
				$data['bookingdetails'] = $this->check_current_booking();
			}
			else
			{
				$data['bookingdetails'] = array('Rented' => false);
			}
			//Load message to display
			$data['pinErrMsg'] = $pinErrMsg;
			if ($showPinMsg != NULL) {
				$data['msg2'] = $showPinMsg;
			}
			else if ($unlockMsg != NULL) {
				$data['msg2'] = $unlockMsg;
			}
			else {
				$data['msg2'] = NULL;
			}

			//Get notifications
			$data['notifications'] = $this->updatenotificationmodel->get_notification_for_user();

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
			$this->LockerModel->Book_Locker();
			redirect('Home');
		}
		
		//Get current locker booking (Is_Active = true)
		public function check_current_booking()
		{
			$result = $this->LockerModel->CheckLockerBooking();
			return $result;
		}
		
		//Get all bookings (current and past)
		public function get_all_booking_details()
		{
			$data = $this->LockerModel->GetAllLockerBookingRecord();
			return $data;
		}
		
		//Complete current locker booking (and pay for it)
		public function complete_booking()
		{
			$result = $this->LockerModel->Complete_Booking();
			redirect('Home');
		}

		public function change_pin()
		{
			$result = $this->LockerModel->Change_Pin();
			if ($result) //Change pin success
			{
				$msg = "<font size=2 color=red>Your pin has been changed successfully!</font> <br \>";
			} else { //Change pin fail
				$msg = "<font size=2 color=red>Your old pin is incorrect. </font> <br \>";
			}
			$this->index($msg);
		}

		public function unlock_locker()
		{
			$result = $this->LockerModel->Unlock_Locker();
			$this->index(null, $result);
		}

		public function show_pin()
		{
			$result = $this->LockerModel->Show_Pin(true);
			$this->index(null, null, $result);
		}

		public function delete_notification($id)
		{
			$this->updatenotificationmodel->delete_notification($id);
			$this->index();
		}
	}
?>