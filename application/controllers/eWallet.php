<?php
class eWallet extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			
			// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			$this->load->helper('html');
			
			$this->load->model('eWalletModel');
		}
		
		public function index() {
			$this->load->helper(array('form', 'url'));
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('topup_amt10', 'Topup_amt10', 'trim|is_numeric');
			$this->form_validation->set_rules('topup_amt20', 'Topup_amt10', 'trim|is_numeric');
			$this->form_validation->set_rules('topup_amt30', 'Topup_amt10', 'trim|is_numeric');
			$this->retrieve();
		}
		
		//Retrieve user wallet's balance from db
		public function retrieve($msg = NULL) {
			$data['MsgtoDisplay'] = $msg;
			$data['userWallet'] = $this->eWalletModel->retrieve_balance($this->session->Userdata('Username'));
			$this->load->view('eWallet', $data);
		}
		
		//Top up amount to user wallet
		public function top_up() {
			if ($this->eWalletModel->add_balance($this->session->Userdata('Username'), $this->input->post('topupRadio')))
			{
				$msg = "<font size=4 color=Green>Top up successful!</font> <br \>";
				$this->retrieve($msg);
				//$msg = "Top up successful!";
			}
			//$this->retrieve($msg); //Get balance and load view
		}
		
		//Top up amount to user wallet
		public function confirm_payment() {
			$this->load->view('eWallet_3');
		}
}		