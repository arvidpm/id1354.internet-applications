<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-28
 * Time: 14:04
 */


class Recipes extends CI_Controller {

    public function view($page = 'index')
    {

        if ( ! file_exists(APPPATH.'views/recipes/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/jumbotron');
        $this->load->view('templates/navbar');
        $this->load->view('recipes/'.$page);
        $this->load->view('templates/bottombar');
        $this->load->view('templates/footer');
        $data['xmlresult'] = $this->load_xml($page);


    }

    public function load_xml($page = 'xml'){

        $url = base_url('resources/recipes/'.$page.'.xml');
        $xml = simplexml_load_file($url) or die("Can't load file.");

        foreach ($xml->recipe as $recipe) {
            $recipe->title;


        }

    }

}