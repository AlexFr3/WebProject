<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(!isset($_GET["idmanga"])){
        header("location: index.php");
    } else{
        $idManga = $_GET["idmanga"];
        $quantitàDisponibile = $dbh->getQuantity($idManga);
        if($quantitàDisponibile == 0){
            header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+aggiungere+l'articolo+al+carrello");
        } else{
            if($dbh->addToCart($idManga, $_SESSION["email"])){
                header("location: shoppingCartIndex.php?msg=L'articolo+è+stato+aggiunto+al+carrello");
            } else{
                header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+aggiungere+l'articolo+al+carrello");
            };
        }
    }
}
?>