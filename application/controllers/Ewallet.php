<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ewallet extends CI_Controller{
		
		
		public function __construct()
		{
			parent::__construct();
			
			
		}
		
		public function index() {
			$this->load->view('retrieve');
		}
		
		public function retrieve() {
			$username = $this->session->userdata('Username');
			$this->load->model('Retrieve_model');
			//$this->Retrieve_model->retrieve_amount($username);
			$data['amount'] = $this->Retrieve_model->retrieve_amount($username);
			$this->load->view('retrieve',$data);
			
			
		}
		
		public function debug() {
			$username = $this->session->userdata('Username');
			$this->load->model('Retrieve_model');
			
			$data['finalAmt'] = $this->Retrieve_model->updated_price($username, $finalAmt);
			$this->load->view('retrieve',$data);
		}
		
		
		
		//	public function update(){
		//	$username = $this->session->userdata('username');
		//	$this->load->model('Retrieve_model');
		//	$this->Retrieve_model->updated_price($username, $finalAmt);
		//	$this->load->view('E');
			
	//}
	}
	
	//<?php
//('BASEPATH') OR exit('No direct script access allowed');
//class Gallery extends CI_Controller { 
// public function index() {
 // $this->load->model('gallery_model');
 // $data['gallery'] = $this->gallery_model->get_images();
 // $this->load->view('gallery_view', $data);  
// }
//}
	
	