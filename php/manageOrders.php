<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(!isUserSeller()){
        header("location: index.php");
    } else{
        if(isset($_GET["formmsg"])){
            $templateParams["messaggio"] = $_GET["formmsg"];
            unset($_GET["formmsg"]);
        }
        $templateParams["ordiniDaSpedire"] = $dbh->getElaborationOrders();
        $templateParams["ordiniDaConsegnare"] = $dbh->getSentOrders();

        $templateParams["titolo"] = "MangaParadise | Gestione ordini";
        $templateParams["nome"] = "listAllOrders.php";
        $templateParams["scripts"] = ["darkMode.js"];
        require 'template/base.php';
    }
}


?>