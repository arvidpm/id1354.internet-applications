<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 16:53
 */

class Comments_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct(); // Call the model constructor
    }

    public function get_comments($page)
    {

        $query = $this->db->get_where('comments ', array('page' => $page));
        return $query->result_array();

    }

}