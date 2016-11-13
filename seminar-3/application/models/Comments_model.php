<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 16:53
 *
 *
 *
 *  This model makes all the needed SQL queries to the database id1354-mvc.
 *  Data is fetched for the Comments and Recipes controllers (Comments.php and Recipes.php)
 */
class Comments_model extends CI_Model
{

    /**
     *  Fetches information from tables with the specified requirements from
     *  the database and returns the information in an array.
     *
     * @param $site contains a value 0-1 to get the desired comments.
     * @return $result the array containing the information from the tables.
     */
    function getComments($site)
    {
        $this->db->select('cid, comment, page, members.id, username');
        $this->db->from('comments');
        $this->db->join('members', 'members.id = comments.user');
        $this->db->where('page', $site);

        $query = $this->db->get();

        return $query->result();
    }

    /**
     *  Inserts the the written comment, which site it was
     *  written on and the author in the comments table.
     *
     * @param $comment the written text from user input
     * @param $page information about which recipe it was written on.
     * @param $membersid information about who the author was.
     */
    function addComments($comment, $page, $membersid)
    {

        $commentData = array(
            'comment' => $comment,
            'page' => $page,
            'user' => $membersid
        );

        $this->db->insert('comments', $commentData);

    }

    /**
     *  Deletes a written comment, by using the comment id '$cid'
     *
     * @param $cid comment id
     */
    function delComments($cid)
    {

        $this->db->delete('comments', array('cid' => $cid));

    }

}