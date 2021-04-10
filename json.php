<?php

$string=file_get_contents("reviews.json");
//$string = html_entity_decode($string);
$json = json_decode($string, true);


// echo '<pre>';
// print_r($json);
// echo '</pre>';

?>