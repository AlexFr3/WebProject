<?php
require_once 'bootstrap.php';
if (!isUserLoggedIn()) {
    header("location: login.php");
} else {
    $templateParams["titolo"] = "MangaParadise | I miei ordini";
    $templateParams["nome"] = "orders.php";
    $templateParams["scripts"] = ["darkMode.js"];  
    $templateParams["orders"] = $dbh->getOrdersByUser($_SESSION["email"]);
    require 'template/base.php';
}
?>
