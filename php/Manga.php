<?php 
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Manga";
$templateParams["nome"] = "listManga.php";
$templateParams["scripts"] = ["index.js", "darkMode.js"];
$categories = isset($_POST['categories']) ? $_POST['categories'] : [];
$genres = isset($_POST['genres']) ? $_POST['genres'] : [];
$price = isset($_POST['price']) ? $_POST['price'] : null;
$templateParams["allManga"] = $dbh ->getAllManga($categories, $genres, $price);
$templateParams["Categories"] = $dbh -> getCategories();
$templateParams["Genres"] = $dbh -> getAllGenres();
require 'template/base.php';
?>