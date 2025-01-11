<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
    $templateParams["titolo"] = "MangaParadise | Shopping Cart";
    $templateParams["nome"] = "shoppingCart.php";
    require 'template/base.php';
    exit();
} else{
    header("location: menu.php");
    exit();
}

?>