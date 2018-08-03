<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
            
        class AdminNotifications extends CI_Controller {
            public function __construct()
            {
                parent::__construct();
                $this->load->helper('url');
                $this->load->database();
            }
            
            public function index()
            {
                //load the notification model
                $this->load->model('AdminNotifications_Model');

                //call the model function to get the notification data
                $notificationresult = $this->AdminNotifications_Model->get_notification();
                $data['notificationlist'] = $notificationresult;

                //load the notification view
                $this->load->view('AdminNotifications',$data);
            }
        }
?>