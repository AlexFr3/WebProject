<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(!isUserSeller()){
        header("location: index.php");
    } else{
        $templateParams["titolo"] = "MangaParadise | Prodotti";
        $templateParams["Manga"] = $dbh->getAllDatabaseManga();
        $templateParams["nome"] = "productslist.php";
        $templateParams["scripts"] = ["darkMode.js", "manga.js"];
        require 'template/base.php';
    }
    /*
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
    require 'template/base.php';*/


}

?>