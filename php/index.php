<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Home";
$templateParams["LatestManga"] = $dbh->getLatestManga(6);
$templateParams["TopRatedManga"] = $dbh->getTopRatedManga(3);
$templateParams["nome"] = "menu.php";
$templateParams["scripts"] = ["index.js", "darkMode.js", "addToCart.js","manga.js"];
require 'template/base.php';
?>