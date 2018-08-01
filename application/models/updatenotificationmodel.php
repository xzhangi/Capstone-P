<?php
            if ( ! defined('BASEPATH')) exit('No direct script access allowed');

            class updatenotificationmodel extends CI_Model
            {
                function __construct()
                {
                // Call the Model constructor
                parent::__construct();
                }

                //fetch notification record by notification id
                function get_notification($notificationid)
                {
                    $this->db->where('notification_id', $notificationid);
                    $this->db->from('tbl_notifications');
                    $query = $this->db->get();
                    return $query->row();
                }

                function get_user()
                {
                    $this->db->select('username');
                    $this->db->from('tbl_users');
                    $this->db->where('username != "Admin"');
                    $query = $this->db->get();
                    $result = $query->result_array();

                    // $username = array('-SELECT-');

                    // for ($i = 0; $i < count($result); $i++){
                    //     array_push($username, $result[$i]->username);
                    // }
                    return $result;
                }
            }
?>