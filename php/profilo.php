<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    $templateParams["titolo"] = "MangaParadise | Profilo";
    $templateParams["nome"] = "schermata-profilo.php";
    require 'template/base.php';
}



?>