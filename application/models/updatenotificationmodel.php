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
                function get_notification($ID)
                {
                    $this->db->where('ID', $ID);
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

                function get_notification_for_user()
                {
                    $this->db->select('*');
                    $this->db->from('tbl_notifications');
                    $this->db->where('Username', $this->session->userdata('Username'));
                    $this->db->where('Is_Deleted', false);
                    $query = $this->db->get();
                    $result = $query->result();
                    $list = Array();
                    
                    // There are notifications
                    if($query->num_rows() > 0)
                    {
                        for ($i = 0; $i < count($result); $i++)
                        {
                            $list[$i] = (object)NULL;
                            $list[$i]->ID = $result[$i]->ID;
                            $list[$i]->Username = $result[$i]->Username;
                            $list[$i]->Title = $result[$i]->Title;
                            $list[$i]->Content = $result[$i]->Content;
                            $list[$i]->Create_Date = $result[$i]->Create_Date;
                        }
                        return $list;
                    }
                    else //No notifications for user
                    {
                        return false;
                    }
                }
            }
?>