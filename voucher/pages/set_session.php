<?php
session_start();

$_SESSION['tripType'] = $_POST['tripType'];
$_SESSION['foodOptions'] = json_decode($_POST['foodOptions']);
$_SESSION['totalCost'] = $_POST['totalCost'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['entertainmentOptions'] = json_decode($_POST['entertainmentOptions']);
$_SESSION['days'] = $_POST['days'];
?>