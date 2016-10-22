<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->db->select('cid, comment, page, members.id, username');
        $this->db->from('comments');
        $this->db->join('members', 'members.id = comments.user');
        $this->db->where('page', $site);

        $query = $this->db->get();

        $jsonresult = json_encode($query->result());

        return $jsonresult;

    }

    function addComments($comment, $page, $membersid)
    {

        $commentData = array(
            'comment' => $comment,
            'page' => $page,
            'user' => $membersid
        );

        $this->db->insert('comments', $commentData);

    }

    function delComments($cid)
    {

        $this->db->delete('comments', array('cid' => $cid));

    }

}