<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class deleteNotifications extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->database();
            
            //load the student model
            $this->load->model('deletenotificationmodel');
        }
        //index function
        function index()
        {
            //get the student list
            $data['notification_list'] = $this->deletenotificationmodel->get_notifications();
        }

        //delete student record from db
        function delete_notification($ID)
        {
            //load the student model
            $this->load->model('deletenotificationmodel');

            //get the notification list
            $data['notification_list'] = $this->deletenotificationmodel->get_notifications();

            //delete notification record
            $this->db->where('ID', $ID);
            $this->db->delete('tbl_notifications');
            redirect('AdminNotifications');

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Deleted!</div>');
            redirect('AdminNotifications', 'refresh');
        }
    }
?>