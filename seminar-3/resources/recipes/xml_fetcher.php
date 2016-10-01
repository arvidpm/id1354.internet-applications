<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-17
 * Time: 23:55
 */

$url = 'meatballs.xml';
$xml = simplexml_load_file($url) or die("Can't load file.");

foreach ($xml->recipe as $recipe)
{
    echo $recipe->title ."<br><br>";

    foreach ($recipe->ingredient->children() as $child)
    {
        echo $child . "<br>";
    }
    foreach ($recipe->recipetext->children() as $child)
    {
        echo $child . "<br>";
    }
    foreach ($recipe->nutrition->children() as $child)
    {
        echo $child . "<br>";
    }
}