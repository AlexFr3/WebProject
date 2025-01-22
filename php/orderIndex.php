<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: products.php");
}else{
    $templateParams["titolo"] = "MangaParadise | Ordine";
    $templateParams["nome"] = "order.php";
    $templateParams["scripts"] = ["darkMode.js"];
    if (isset($_GET['idOrdine'])) {
        $idOrdine = intval($_GET['idOrdine']); 
        $templateParams["ordine"] = $dbh->getMangaByOrder($idOrdine);
    } else {
        $templateParams["ordine"] = null; 
    }
}
require 'template/base.php';
?>