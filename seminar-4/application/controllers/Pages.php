<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-28
 * Time: 14:04
 */

class Pages extends CI_Controller {

    public function index() {

        $this->view();

    }


    public function view($page = 'index') {

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/footer');

        # Caches output for 10 minutes
        $this->output->cache(10);

    }

}