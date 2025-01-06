<?php 
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Manga";
$templateParams["nome"] = "listManga.php";
$templateParams["allManga"] = $dbh ->getAllManga();
require 'template/base.php';
?>