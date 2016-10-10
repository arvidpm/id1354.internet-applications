<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-02
 * Time: 23:20
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *    This controller handles all the calls to the model <code>
 *    User_model.php</code>
 *
 *    NOTE!
 *
 *    The <code>redirect_back()</code> functions sends the user
 *    back to the previous view displaying controller that the
 *    user came from.
 *
 * @see MY_url_helper.php
 *    courtesy of: Jonathan Azulay.
 */
class Members extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('members_model', '', TRUE);

    }


    public function view($page = 'index')
    {


        if (!file_exists(APPPATH . 'views/members/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');
        $this->load->view('members/' . $page);
        $this->load->view('templates/bottombar');
        $this->load->view('templates/footer');

    }


    function get_member()
    {

        /*
         * Provides Cross Site Script Hack filtering.
         * This function is an alias for CI_Input::xss_clean(). For more info, please see the Input Library documentation.
         * */
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) // Didn't validate
        {

            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect_back();

        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->checkDatabase($username, $password)) {

                // User login ok
                redirect(base_url());

            } else {

                // User login failed
                $this->session->set_flashdata('validation_errors', 'Incorrect username or password!');
                redirect_back();

            }
        }
    }


    function create_member()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) // Didn't validate
        {

            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect_back();

        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->setDatabase($username, $password)) {

                // Successfully created user
                $this->session->set_flashdata('validation_errors', 'User registration successful, please log in!');
                redirect(base_url('members/view/signin'));

            } else {

                // Failed creating user (this should never happen)
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect_back();

            }
        }
    }


    function checkDatabase($username, $password)
    {

        $result = $this->members_model->get_members($username, $password);

        if ($result) {

            foreach ($result as $row) {
                $sess_array =

                    array('id' => $row->id,
                        'username' => $row->username
                    );

                // Is used like this: $this->session->userdata['logged_in']['id'];
                $this->session->set_userdata('logged_in', $sess_array);
            }

            return TRUE;

        } else {

            $this->form_validation->set_message('checkDatabase', 'Invalid username or password');

            return FALSE;
        }
    }


    function setDatabase($username, $password)
    {

        $result = $this->members_model->set_members($username, $password);

        if ($result) {

            return TRUE;

        } else {

            $this->form_validation->set_message('setDatabase', 'Something went wrong, try again!');

            return FALSE;
        }
    }


    function logout()
    {

        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect_back();

    }

}