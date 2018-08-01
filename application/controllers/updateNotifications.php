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

        function getNotification($notificationid){

            // $data['notification_id'] = $notificationid;

            // //fetch data from notification table
            // $data['notificationlist'] = $this->updatenotificationmodel->get_notification();

            $this->load->model('updatenotificationmodel');

            //fetch notification record for the given notification id.
            $data['notificationrecord'] = $this->updatenotificationmodel->get_notification($notificationid);
            $data['notificationuser'] = $this->updatenotificationmodel->get_user();
            $data['userrlist'] = $this->updatenotificationmodel->get_user();

            $this->load->view('updateNotifications', $data);

        }

        function updateNotification($notificationid){
            $this->load->library('form_validation');

                $data = array(
                'notification_name' => $this->input->post('notificationname'),
                'notification_description' => $this->input->post('notificationdescription'),
                'notification_date' => $this->input->post('notificationdate'),
                'notification_user' => $this->input->post('notificationuser'),
                );

                //update notification record
                $this->db->where('notification_id', $notificationid);
                $this->db->update('tbl_notifications', $data);
                
                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Updated!</div>');
                redirect('AdminNotifications', 'refresh');
        
        }
        
        
        
    }
?>