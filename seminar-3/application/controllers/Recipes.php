<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-28
 * Time: 14:04
 *
 * Unused for the moment
 *
 * $this->load->model('xml_model');
 * $data['title'] = $this->xml_model->getTitle($page);
 *
 */
class Recipes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model', '', TRUE);
    }


    public function view($page = 'index')
    {


        if (!file_exists(APPPATH . 'views/recipes/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data = array(
            'recipe',
            'result',
            'site'
        );

        $data['recipe'] = $page;


        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');

        if ($page == 'meatballs')
        {
            $this->loadMeatballs($data, $page);
        } else {
            $this->loadPancakes($data, $page);
        }

        $this->load->view('recipes/'.$page.'.php', $data);
        $this->load->view('templates/bottombar');
        $this->load->view('templates/footer');

    }

    private function loadMeatballs(&$data)
    {
        $data['result'] = $this->comments_model->getComments('0');
        $data['site'] = '0';

    }

    private function loadPancakes(&$data)
    {
        $data['result'] = $this->comments_model->getComments('1');
        $data['site'] = '1';
    }

}