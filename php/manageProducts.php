<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
}

if(!isUserSeller()){
        header("location: index.php");
} 

if(!isset($_GET["action"]) || ($_GET["action"]!=="modifica" && $_GET["action"]!=="inserisci" && $_GET["action"]!=="elimina") || ($_GET["action"]!=="inserisci" && !isset($_GET["idManga"]))){
    header("location: products.php");
}

if($_GET["action"]!=="inserisci"){
    $risultato = $dbh->getPostByIdAndAuthor($_GET["id"], $_SESSION["idautore"]);
    if(count($risultato)==0){
        $templateParams["manga"] = null;
    }
    else{
        $templateParams["manga"] = $risultato[0];
        $templateParams["manga"]["categorie"] = explode(",", $templateParams["manga"]["categorie"]);
        $templateParams["manga"]["generi"] = explode(",", $templateParams["manga"]["generi"]);
    }
}

else{
    $templateParams["manga"] = getEmptyArticle();
}

$templateParams["titolo"] = "MangaParadise | Gestione Prodotto";
$templateParams["nome"] = "productForm.php";
$templateParams["scripts"] = ["darkMode.js"];
$templateParams["azione"] = $_GET["action"];
require 'template/base.php';

?>