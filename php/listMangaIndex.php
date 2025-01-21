<?php 
require_once 'bootstrap.php';
$templateParams["titolo"] = "MangaParadise | Manga";
$templateParams["nome"] = "listManga.php";
$templateParams["scripts"] = ["darkMode.js", "addToCart.js","manga.js","listManga.js"];
$orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : null;
$categories = isset($_POST['categories']) ? $_POST['categories'] : [];
$genres = isset($_POST['genres']) ? $_POST['genres'] : [];
$price = isset($_POST['price']) ? $_POST['price'] : null;
$templateParams["allManga"] = $dbh ->getAllManga($categories, $genres, $price, $orderBy);
$templateParams["Categories"] = $dbh -> getCategories();
$templateParams["Genres"] = $dbh -> getAllGenres();
require 'template/base.php';
?>