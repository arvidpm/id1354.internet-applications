<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-28
 * Time: 14:04
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
            'recipe' => $page,
            'site'
        );

        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');

        if ($page == 'meatballs') {
            $this->loadMeatballs($data, '0');

        } else {
            $this->loadPancakes($data, '1');
        }

        $this->load->view('recipes/commentbox', $data);
        $this->load->view('templates/bottombar');
        $this->load->view('templates/footer');

    }

    private function loadMeatballs(&$data, $site)
    {
        $this->load->view('recipes/meatballs');
        $data['site'] = $site;

    }

    private function loadPancakes(&$data, $site)
    {
        $this->load->view('recipes/pancakes');
        $data['site'] = $site;

    }

}