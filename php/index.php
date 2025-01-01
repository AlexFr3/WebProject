<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Home";
//$templateParams["js"] = array("js/index.js");
$templateParams["RandomManga"] = $dbh->getRandomManga(6);
$templateParams["LatestManga"] = $dbh->getLatestManga(6);
$templateParams["TopRatedManga"] = $dbh->getTopRatedManga(3);

$templateParams["nome"] = "menu.php";
require 'template/base.php';
?>