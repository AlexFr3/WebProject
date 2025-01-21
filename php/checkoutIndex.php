<?php 
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Checkout";
$templateParams["nome"] = "checkout.php";
$templateParams["scripts"] = ["index.js", "darkMode.js", "addToCart.js","manga.js","listManga.js"];
require 'template/base.php';
?>