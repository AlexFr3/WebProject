<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
}


$templateParams["titolo"] = "MangaParadise | Profilo";
?>