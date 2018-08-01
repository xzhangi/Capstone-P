<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

class notification extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function get_notification()
    {
        $this->db->select('notification_id');
        $this->db->select('notification_name');
        $this->db->select('notification_description');
        $this->db->select('notification_date');
        $this->db->select('notification_status');
        $this->db->from('tbl_notifications');
        $query = $this->db->get();
        $result = $query->result();

        $notification_id = array('-SELECT-');
        $notification_name = array('-SELECT-');
        $notification_description = array('-SELECT-');
        $notification_date = array('-SELECT-');
        $notification_status = array('-SELECT-');

        for ($i=0; $i < count($result); $i++)
        {
            array_push($notification_id, $result[$i]->notification_id);
            array_push($notification_name, $result[$i]->notification_name);
            array_push($notification_description, $result[$i]->notification_description);
            array_push($notification_date, $result[$i]->notification_date);
            array_push($notification_status, $result[$i]->notification_status);
        }
        return $notification_result = array_combine($notification_id, $notification_name, $notification_description, $notification_date, $notification_status);
    }
}
?>