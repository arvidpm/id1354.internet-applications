<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-11
 * Time: 20:36
 *
 *
 *    This controller handles all the calls to the model
 *    <code>Comments_model.php</code>
 *
 *    NOTE!
 *
 *    The <code>redirect_back()</code> functions sends the user
 *    back to the previous view displaying controller that the
 *    user came from.
 *
 * @see helpers/MY_url_helper.php
 *    courtesy of: Jonathan Azulay.
 *
 */
class Comments extends CI_Controller
{

    /**
     *    The default constructor. Loads the comments model.
     * @see Comments_model.php
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model', '', TRUE);
    }

    /**
     *    Get comments from a chosen page through the comments model.
     *    Result echoed to viewmodel.
     */
    function getComment()
    {

        $page = $this->input->post('page');
        echo $this->comments_model->getComments($page);

    }

    /**
     *    Adds a comment to the database through the comments model
     *    by information from user input and sending to the model.
     *    cvm.js calls addComment which then fetches comment data from Knockout.
     *    Result echoed to viewmodel.
     */
    function addComment()
    {

        $comment = strip_tags($this->input->post('comment'));
        $page = $this->input->post('page');
        $session = $this->session->userdata('logged_in');
        $membersid = $session['id'];

        echo $this->comments_model->addComments($comment, $page, $membersid);

    }

    /**
     *    Deletes a comment from the database through the comments model
     *    by information from the viewmodel and sending to the model.
     *
     */
    function delComment()
    {

        $cid = $this->input->post('delcomment');
        $this->comments_model->delComments($cid);

    }


}
