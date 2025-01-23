<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
}
if(!isUserSeller()){
    header("location: index.php");
}


$templateParams["titolo"] = "MangaParadise | Gestione Ordine";
$templateParams["nome"] = "showOrderDetails.php";
$templateParams["scripts"] = ["darkMode.js","sliderTrack.js"];
if (isset($_GET['idOrdine'])) {
    $idOrdine = intval($_GET['idOrdine']); 
    $templateParams["ordine"] = $dbh->getMangaByOrder($idOrdine);
} else {
    $templateParams["ordine"] = null; 
}

require 'template/base.php';
?>