<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-02
 * Time: 23:20
 */

class Users extends CI_Controller {


    public function view($page = 'index') {


        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        #$this->load->model('xml_model');
        #$data['title'] = $this->xml_model->getTitle($page);

        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');
        $this->load->view('pages/'.$page);
        $this->load->view('templates/bottombar');
        $this->load->view('templates/footer');


    }

}