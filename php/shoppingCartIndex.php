<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(isset($_GET["msg"])){
        $templateParams["messaggiocarrello"] = $_GET["msg"];
    } else{
        unset($_GET["msg"]);
        if(isset($templateParams["messaggiocarrello"])){
            unset($templateParams["messaggiocarrello"]);
        }
    }
    $templateParams["manga-in-carrello"] = $dbh->getMangaInCart($_SESSION["email"]);
    $templateParams["prezzo-totale"] = $dbh->getTotalPrice($_SESSION["email"]);
    $templateParams["numero-articoli"] = $dbh->getItemNumber($_SESSION["email"]);
    $templateParams["titolo"] = "MangaParadise | Carrello";
    $templateParams["nome"] = "shoppingCart.php";
    $templateParams["scripts"] = ["removeFromCart.js","darkMode.js", "modifyQuantityInCart.js"];
    require 'template/base.php';
}
?>