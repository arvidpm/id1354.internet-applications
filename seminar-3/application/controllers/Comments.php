<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-11
 * Time: 20:36
 *
 *
 *	This controller handles all the calls to the model <code>
 *	Comments_model.php</code>
 *
 *	NOTE!
 *
 *	The <code>redirect_back()</code> functions sends the user
 *	back to the previous view displaying controller that the
 *	user came from.
 *
 *	@see helpers/MY_url_helper.php
 *	courtesy of: Jonathan Azulay.
 *
 */

class Comments extends CI_Controller
{

    /**
     *	The default constructor. Loads the comments model.
     *	@see Comments_model.php
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model', '', TRUE);
    }

    /**
     *	Adds a comment to the database through the comments model
     *	by information from user input and sending to the model.
     *
     *	Displays validation errors if the any set rules were broken.
     */
    function addComment()
    {
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('validation_errors_comments', validation_errors());
            redirect_back();
        } else {
            $comment = strip_tags($this->input->post('comment'));
            $page = $this->input->post('site');
            $membersid = $this->input->post('membersid');

            $this->comments_model->addComments($comment, $page, $membersid);
            redirect_back();
        }
    }

    /**
     *	Deletes a comment from the database through the comments model
     *	by information from user input and sending to the model.
     *
     *	@param $cid retrieved by GET method, which is not optimal.
     *  @param $userid retrieved by $session array
     */
    function delComment($userid, $cid)
    {

        $session = $this->session->userdata('logged_in');

        if ($session['id'] === $userid) {

            $this->comments_model->delComments($cid);
            redirect_back();
        }
        else{
            echo 'Not logged in fool!';
        }

    }

}
