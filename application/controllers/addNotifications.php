<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

    class addNotifications extends CI_Controller
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
                $this->load->model('addnotificationmodel');
            }

            //default function of ci controller
            public function index()
            {
                //fetch data from user table
                $data['userlist'] = $this->addnotificationmodel->get_users();
                $this->load->view('addNotifications', $data);
            }

            public function validateNotification(){
                $this->load->library('form_validation');

                    $data = array(
                    'notification_name' => $this->input->post('notificationname'),
                    'notification_description' => $this->input->post('notificationdescription'),
                    'notification_date' => $this->input->post('notificationdate'),
                    'notification_user' => $this->input->post('notificationuser'),
                    );
                    //insert the form data into database
                    $this->db->insert('tbl_notifications', $data);

                    //display success message
                    $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Notification Added Successfully.</div>');
                    redirect('addNotifications','refresh');

            }
                
        
    }

?>