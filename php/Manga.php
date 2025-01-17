<?php 
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Manga";
$templateParams["nome"] = "listManga.php";
$templateParams["scripts"] = ["index.js", "darkMode.js"];
$templateParams["allManga"] = $dbh ->getAllManga();
$templateParams["Categories"] = $dbh -> getCategories();
$templateParams["Genres"] = $dbh -> getAllGenres();
require 'template/base.php';
?>