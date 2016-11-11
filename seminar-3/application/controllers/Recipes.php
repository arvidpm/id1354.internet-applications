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

    /**
     *	the controllers constructor. This function is only necessary
     *	because the controller needs the comment model in order to
     *	call it's functions.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model', '', TRUE);
    }

    /**
     *	Displays the view fragments for this controller.
     */
    public function view($page = 'index')
    {


        if (!file_exists(APPPATH . 'views/recipes/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data = array(
            'recipe' => $page,
            'result',
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

    /**
     *	Displays the meatballs fragment containing the recipe as well
     *	the comments for that recipe.
     *
     *  @param &$data a pointer to the data array.
     *  @param $site holds the pageid value
     */
    private function loadMeatballs(&$data, $site)
    {

        $this->load->view('recipes/meatballs');
        $data['result'] = $this->comments_model->getComments($site);
        $data['site'] = $site;

    }

    /**
     *	Displays the pancakes fragment containing the recipe as well
     *	the comments for that recipe.
     *
     *  @param &$data a pointer to the data array.
     *  @param $site holds the pageid value
     */
    private function loadPancakes(&$data, $site)
    {

        $this->load->view('recipes/pancakes');
        $data['result'] = $this->comments_model->getComments($site);
        $data['site'] = $site;

    }

}