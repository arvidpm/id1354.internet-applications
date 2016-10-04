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


    /**
     *    The default constructor. Loads the user model.
     * @see User_model.php
     */
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

        #$this->load->model('xml_model');
        #$data['title'] = $this->xml_model->getTitle($page);

        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');
        $this->load->view('members/' . $page);
        $this->load->view('templates/bottombar');
        $this->load->view('templates/footer');

    }


    function get_member()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_queryDatabase');


        if ($this->form_validation->run() == FALSE) // Didn't validate
        {

            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect_back();

        } else {

            redirect(base_url());
        }
    }


    /**
     *    Verifies if entered user input was correctly entered.
     *
     * @param $password user input from password field.
     * @return TRUE if username and password matched in database
     *            FALSE if it didn't match.
     * @usedby User::verifyLogin()
     */


    function queryDatabase($password)
    {

        $username = $this->input->post('username');

        $result = $this->members_model->get_members($username, $password);

        if ($result)
        {

            foreach ($result as $row) {
                $sess_array =

                    array(  'id' => $row->id,
                            'username' => $row->username
                        );

                $this->session->set_userdata('logged_in', $sess_array);
            }

            return TRUE;

        } else {

            $this->form_validation->set_message('checkDatabase', 'Invalid username or password');

            return FALSE;
        }
    }

    /**
     *    Unsets the session data containing the users username
     *    and id as well as destroying the session.
     */

    function logout()
    {

        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect_back();

    }


    function create_member()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == FALSE) // Didn't validate
        {

            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect_back();

        } else {

            redirect_back();

        }


    }

}