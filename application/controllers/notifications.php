<?php

if (! defined('BASEPATH')) exit ('No direct script access allowed');

class notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('notifications');
    }
    function index()
    {
        $data['locka'] = $this->notification->get_notification();

        $this->form_validation->set_rules('notification_name', 'Notification Title', 'required');
        $this->form_validation->set_rules('notification_description', 'Notification Description', 'required');
        $this->form_validation->set_rules('notification_date', 'Notification Date', 'required');
        $this->form_validation->set_rules('notification_status', 'Notification Status', 'required');
    }
}
?>