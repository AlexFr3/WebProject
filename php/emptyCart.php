<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if($dbh->emptyCart($_SESSION["email"])){
        header("location: shoppingCartIndex.php?msg=Gli+articoli+sono+stati+rimossi+dal+carrello");
    } else{
        header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+rimuovere+gli+articoli+dal+carrello");
    };
}
?>