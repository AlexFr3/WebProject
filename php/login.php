<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    if(!$dbh->existsUserWithEmail($email)){
        //account non esistente
        $templateParams["errorelogin"] = "Errore! Non è stato possibile trovare un utente con questa mail!";
    } else{
        $login_result = $dbh->checkLogin($email, $password);
        if(count($login_result)==0){
            //password errata
            $templateParams["errorelogin"] = "Errore! La password non è corretta!";
        } else{
            registerLoggedUser($login_result[0]);
        }
    }
}

if(isUserLoggedIn()){
    header("location: profilo.php");
} else{
    $templateParams["titolo"] = "MangaParadise | Login";
    $templateParams['nome'] = "login-form.php";
    if(isset($_GET["msg"])){
        $templateParams["errorelogin"] = $_GET["msg"];
    }
}
require 'template/base.php';
?>