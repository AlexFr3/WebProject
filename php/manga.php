<?php
require_once 'bootstrap.php';

if (isset($_GET['id'])) {
    $mangaId = intval($_GET['id']); 
    $mangaDetails = $dbh->getMangaById($mangaId); 

    if ($mangaDetails) {
        $templateParams["titolo"] = "MangaParadise | " . htmlspecialchars($mangaDetails["Titolo"]);
        $templateParams["nome"] = "mangaDetails.php";
        $templateParams["manga"] = $mangaDetails;
    } else {
        $templateParams["titolo"] = "MangaParadise | Manga non trovato";
    }
} else {
    header("Location: index.php"); 
    exit;
}

require 'template/base.php';
?>
