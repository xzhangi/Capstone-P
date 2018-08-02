<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

class addnotificationmodel extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //get user table to populate the user dropdown
    function get_users()
    {
        $this->db->select('username');
        $this->db->from('tbl_users');
        $this->db->where('username != "Admin"');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
}
?>