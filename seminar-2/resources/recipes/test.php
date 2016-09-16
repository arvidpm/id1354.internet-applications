<!DOCTYPE html>

<html lang="en">
<head>
    <title>Tasty Recipes - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-16
 * Time: 15:06
 */

$url = 'recipes.xml';
$xml = simplexml_load_file($url) or die("Can't load file.");

?>
<pre><?php //print_r($xml); ?></pre>

<?php
foreach ($xml->recipe->item as $item)


?>


</body>
</html>


