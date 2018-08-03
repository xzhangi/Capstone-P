<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AccountManagement extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
		}
		 
		public function index()
		{
			// Load model
			$this->load->model('AdminModel');
			//Call any required model functions
			$data['userlist'] = $this->AdminModel->Get_User_List();
			//Load the view
			$this->load->view('Admin/AccountManagement', $data);
		}
		
			//delete user record from db
		function delete_user($username)
		{
			$this->load->model('AdminModel');
			$data['userlist'] = $this->AdminModel->Get_User_List();
			$this->db->where('username', $username);
			$this->db->delete('tbl_users');
			redirect('accountmanagement');
		}
		
		function locker()
		{
			$username = $this -> session ->userdata('username');
			$this->load->model('AdminModel');
			$data['lockerName'] = $this->AdminModel->get_other_tables($username);
			$this->load->view('Admin/AccountManagement',$data);
		}
		
		
		

    }


?>