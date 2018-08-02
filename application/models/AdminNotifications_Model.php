<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
            
        class AdminNotifications_Model extends CI_Model{
            function __construct()
            {
                // Call the Model constructor
                parent::__construct();
            }
    
            //read the notification list from db
            function get_notification()
            {
                $sql = 'select * from tbl_notifications';
                $query = $this->db->query($sql);
                $result = $query->result();
                return $result;
            }
        }
?>