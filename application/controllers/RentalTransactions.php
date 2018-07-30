<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class RentalTransactions extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('AdminModel');
			//Call any required model functions
			$data['translist'] = $this->AdminModel->get_all_transactions();
			//Load the view
			$this->load->view('Admin/AllRentalTransactions', $data);
		}
	}
?>