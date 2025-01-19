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
    $templateParams["titolo"] = "MangaParadise | Shopping Cart";
    $templateParams["nome"] = "shoppingCart.php";
    require 'template/base.php';
}
?>