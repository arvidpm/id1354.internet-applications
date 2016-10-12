<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-11
 * Time: 20:36
 */

class Comments extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model', '', TRUE);
    }


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
