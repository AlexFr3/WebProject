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
        $templateParams["titolo"] = "MangaParadise | Prodotti";
        $templateParams["Manga"] = $dbh->getAllDatabaseManga();
        $templateParams["nome"] = "productslist.php";
        $templateParams["scripts"] = ["darkMode.js", "manga.js"];
        require 'template/base.php';
    }
}

?>