<?php 
require_once 'bootstrap.php';

$templateParams["titolo"] = "MangaParadise | Notifiche";
$templateParams["nome"] = "notifiche.php";
$templateParams["notifiche"] = $dbh -> getNotifiche($_SESSION["email"]);
$templateParams["scripts"] = ["darkMode.js"];
require 'template/base.php';
?>