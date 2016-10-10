<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 16:53
 */
class Comments_model extends CI_Model
{

    function getComments($site)
    {

        $query = $this->db->get_where('comments', array('page' => $site));
        return $query->result();

    }

}