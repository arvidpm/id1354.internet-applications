<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-29
 * Time: 16:53
 *
 *  This model makes all the needed SQL queries to the database id1354-js.
 *  Data is fetched for the <code>Comments.php</code> and <code>Recipes.php</code> controllers.
 */
class Comments_model extends CI_Model
{

    /**
     *  Fetches information from tables with the specified requirements from
     *  the database and returns the information in an array.
     *
     * @param $site contains a value 0-1 to get the desired comments.
     * @return $result json encoded array containing the information from the tables.
     */
    function getComments($site)
    {
        $this->db->select('cid, comment, page, members.id, username');
        $this->db->from('comments');
        $this->db->join('members', 'members.id = comments.user');
        $this->db->where('page', $site);
        $this->db->order_by('cid', 'asc');

        $query = $this->db->get();

        $result = json_encode($query->result());

        return $result;

    }

    /**
     *  Inserts the the written comment, which site it was
     *  written on and the author in the comments table.
     *
     * @param $comment the written text from user input
     * @param $page information about which recipe it was written on.
     * @param $membersid information about who the author was.
     * @return $result json encoded array containing the information from the tables.
     */
    function addComments($comment, $page, $membersid)
    {

        $commentData = array(
            'comment' => $comment,
            'page' => $page,
            'user' => $membersid
        );

        $query = $this->db->insert('comments', $commentData);

        $result = json_encode($query->result());

        return $result;

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