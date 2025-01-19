<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(!isset($_GET["idmanga"])){
        header("location: carrello.php");
    } else{
        $idManga = $_GET["idmanga"];
        if($dbh->removeFromCart($idManga, $_SESSION["email"])){
            header("location: shoppingCartIndex.php?msg=L'articolo+è+stato+rimosso+dal+carrello");
        } else{
            header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+rimuovere+l'articolo+dal+carrello");
        };
    }
}
?>