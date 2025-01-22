<?php 
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
}
try {
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitButton"])) { 
        if (isset($_POST["cardName"], $_POST["cardNumber"], $_POST["expiryDate"], $_POST["cvv"])) {
        
            $mangaInCar = $dbh->getMangaInCart($_SESSION["email"]);
            foreach ($mangaInCar as $manga) {
                $dbh->updateMangaQuantityAndCart($manga["idManga"], $manga["Quantità_In_Carrello"]);
            }
            
            $totalPrice = $dbh->getTotalPrice($_SESSION["email"]);
            
            $dbh->createOrder($_SESSION["email"], $mangaInCar, $totalPrice);

            $msg = "L'ordine è stato completato con successo! Grazie per il tuo acquisto.";
            header("location: shoppingCartIndex.php?msg=".$msg);
        } else {
            throw new Exception("Dati del modulo mancanti o incompleti.");
        }
    }
} catch (Exception $e) {
    $msg = "Non è stato possibile elaborare l'ordine: ".htmlspecialchars($e->getMessage());
    header("location: shoppingCartIndex.php?msg=".$msg);
}
$templateParams["titolo"] = "MangaParadise | Checkout";
$templateParams["nome"] = "checkout.php";
$templateParams["scripts"] = ["darkMode.js"];
require 'template/base.php';
?>