<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 17:11
 */

class Comments_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_members($username)
    {

        $query = $this->db->get_where('members ', array('username' => $username));
        return $query->result_array();

    }

}