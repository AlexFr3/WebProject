<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(!isUserSeller()){
        header("location: index.php");
    } else{
        if(isset($_GET["msg"])){
            $templateParams["messaggio"] = $_GET["msg"];
            unset($_GET["msg"]);
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