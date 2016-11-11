<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-02
 * Time: 23:20
 */

/**
 *    This controller handles all the calls to the model <code>Members_model.php</code>
 *
 *    NOTE!
 *
 *    The <code>redirect_back()</code> functions sends the user
 *    back to the previous view displaying controller that the
 *    user came from.
 *
 *    @see helpers/MY_url_helper.php
 *    courtesy of: Jonathan Azulay.
 */
class Members extends CI_Controller
{

    /**
     *	The default constructor. Loads the user model.
     *	@see Members_model.php
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('members_model', '', TRUE);

    }

    /**
     *	Displays the view fragments for the member sites
     */
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

    /**
     *	Verifies if entered user input was correctly entered.
     *
     */
    function get_member()
    {

        /*
         * Provides Cross Site Script Hack filtering.
         * This function is an alias for CI_Input::xss_clean().
         * For more info, please see the Input Library documentation.
         *
         * */
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) // Form validation failed, aborting
        {

            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect_back();

        } else {

            // Set variables from the form
            $username = strip_tags($this->input->post('username'));
            $password = strip_tags($this->input->post('password'));

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

    /**
     *	Handles all member registration calls.
     *
     */
    function create_member()
    {

        /*
         * Provides Cross Site Script Hack filtering.
         * This function is an alias for CI_Input::xss_clean().
         * For more info, please see the Input Library documentation.
         *
         * All fields are trimmed (of whitespaces), required and cleaned for Cross Site Script hacking.
         * 're-password' have to match 'password'
         *
         * */
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('re-password', 'Password Confirmation', 'trim|required|xss_clean|matches[password]');


        if ($this->form_validation->run() == FALSE) // Form validation failed, aborting
        {

            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect_back();

        } else {

            // Set variables from the form
            $username = strip_tags($this->input->post('username'));
            $password = strip_tags($this->input->post('password'));

            if ($this->setDatabase($username, $password)) {

                // Successfully created user
                $this->session->set_flashdata('validation_errors', 'User registration successful, please log in!');
                redirect(base_url('members/view/signin'));

            } else {

                /* Failed creating user (this should never happen)
                 * If so, should've happened during form validation.
                 */
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect_back();

            }
        }
    }

    /**
     *	Verifies if entered user input was correctly entered.
     *
     *  @param $username user input from username field.
     *	@param $password user input from password field.
     *	@return TRUE if username and password matched in database
     *			FALSE if it didn't match.
     *	@usedby Members::get_member()
     */
    function checkDatabase($username, $password)
    {

        $result = $this->members_model->get_members($username, $password);

        if ($result) {

            foreach ($result as $row) {
                $sess_array =

                    array('id' => $row->id,
                        'username' => $row->username
                    );

                /* Is used like this: $this->session->userdata['logged_in']['id'];
                 * Or storing it to a variable $something and using it.
                 */
                $this->session->set_userdata('logged_in', $sess_array);
            }

            return TRUE;

        } else {

            $this->form_validation->set_message('checkDatabase', 'Invalid username or password');

            return FALSE;
        }
    }

    /**
     *	Call to Members_model.php that handles member registration.
     *
     *  @param $username user input from username field.
     *	@param $password user input from password field.
     *	@return TRUE if user registration was successful
     *			FALSE if registration was unsuccessful (should rarely happen)
     *	@usedby Members::create_member()
     */
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

    /**
     *	Unset the session data containing the users username
     *	and id as well as destroying the session and redirecting the user back.
     */
    function logout()
    {

        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect_back();

    }

}