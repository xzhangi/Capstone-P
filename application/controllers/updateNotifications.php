<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class updateNotifications extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->database();
            $this->load->library('form_validation');
            
            //load the notification model
            $this->load->model('updatenotificationmodel');
        }

        public function index()
        {
            //fetch data from user table
            $data['userrlist'] = $this->updatenotificationmodel->get_user();
            $this->load->view('updateNotifications', $data);
        }

        function getNotification($ID){

            // $data['notification_id'] = $notificationid;

            // //fetch data from notification table
            // $data['notificationlist'] = $this->updatenotificationmodel->get_notification();

            $this->load->model('updatenotificationmodel');

            //fetch notification record for the given notification id.
            $data['notificationrecord'] = $this->updatenotificationmodel->get_notification($ID);
            $data['notificationuser'] = $this->updatenotificationmodel->get_user();
            $data['userrlist'] = $this->updatenotificationmodel->get_user();

            $this->load->view('updateNotifications', $data);

        }

        function updateNotification($ID){
            $this->load->library('form_validation');

                $data = array(
                'Title' => $this->input->post('Title'),
                'Content' => $this->input->post('Content'),
                'Create_Date' => $this->input->post('Create_Date'),
                'Username' => $this->input->post('Username'),
                );

                //update notification record
                $this->db->where('ID', $ID);
                $this->db->update('tbl_notifications', $data);
                
                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Updated!</div>');
                redirect('AdminNotifications', 'refresh');
        
        }
        
        
        
    }
?>