<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class deletenotificationmodel extends CI_Model
    {
        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
        }
        
        //fetch all notification records
        function get_notifications()
        {
            $this->db->from('tbl_notifications');
            // $this->db->join('tbl_school', 'tbl_student.school_id = tbl_school.school_id');
            $query = $this->db->get();
            return $query->result();
        }

        //fetch student record by student no
        function get_notification_record($ID)
        {
            $this->db->where('ID', $ID);
            $this->db->from('tbl_notifications');
            $query = $this->db->get();
            return $query->result();
        }

        // //get notification table to populate the school name dropdown
        // function get_school()
        // {
        //     $this->db->select('notification_id');
        //     $this->db->select('school_name');
        //     $this->db->from('tbl_school');
        //     $query = $this->db->get();
        //     $result = $query->result();

        //     //array to store department id & department name
        //     $sch_id = array('-SELECT-');
        //     $sch_name = array('-SELECT-');
        //     for ($i = 0; $i < count($result); $i++)
        //     {
        //         array_push($sch_id, $result[$i]->school_id);
        //         array_push($sch_name, $result[$i]->school_name);
        //     }
        //     return $school_result = array_combine($sch_id, $sch_name);
        // }
    }
?>