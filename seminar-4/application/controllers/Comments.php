<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    function getComment()
    {

        $page = $this->input->post('page');

        if ($page == '0') {
            echo $this->comments_model->getComments($page);
        } else {
            echo $this->comments_model->getComments($page);
        }

    }

    function addComment()
    {

        $comment = strip_tags($this->input->post('comment'));
        $page = $this->input->post('page');
        $session = $this->session->userdata('logged_in');
        $membersid = $session['id'];

        echo $this->comments_model->addComments($comment, $page, $membersid);

    }



    function delComment()
    {

        $cid = $this->input->post('delcomment');
        $this->comments_model->delComments($cid);

    }


}
