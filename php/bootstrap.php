<?php
session_start();
define("UPLOAD_DIR", "../img/manga");
require_once("functions.php");
require_once("database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "MangaParadise", 3306);
?>