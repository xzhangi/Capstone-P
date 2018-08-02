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
                    'Title' => $this->input->post('Title'),
                    'Content' => $this->input->post('Content'),
                    'Create_Date' => $this->input->post('Create_Date'),
                    'Username' => $this->input->post('Username'),
                    );
                    //insert the form data into database
                    $this->db->insert('tbl_notifications', $data);

                    //display success message
                    $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Notification Added Successfully.</div>');
                    redirect('AdminNotifications','refresh');

            }
                
        
    }

?>