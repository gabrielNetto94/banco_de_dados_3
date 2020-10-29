<?php

require_once "./database.php";
$SQLserver = new SQLserver();

$name = $_POST['name-object'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$SQLserver->createObject();
?>