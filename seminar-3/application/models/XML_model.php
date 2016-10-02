<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-10-02
 * Time: 22:38
 */

class XML_model extends CI_Model
{

    public function __construct() {

        parent::__construct(); // Call the model constructor
    }


    public function load_xml($page = 'xml') {

        $url = base_url('resources/recipes/'.$page.'.xml');
        $xml = simplexml_load_file($url) or die("Can't load file.");

    }

    public function getTitle($xml) {

        foreach ($xml->recipe as $recipe) {
            $title = $recipe->title;


        }

        return $title;
    }

}