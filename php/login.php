<?php
require_once 'bootstrap.php';

if (isset($_POST["email"]) && isset($_POST["password"])) {
    unset($_GET["messaggiologin"]);
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (!$dbh->existsUserWithEmail($email)) {
        $templateParams["errorelogin"] = "Errore! Non è stato possibile trovare un utente con questa mail!";
    } else {
        $login_result = $dbh->checkLogin($email, $password);
        if (!$login_result) { 
            $templateParams["errorelogin"] = "Errore! La password non è corretta!";
        } else {
            registerLoggedUser($login_result);
        }
    }
}

if (isUserLoggedIn()) {
    header("location: profilo.php");
} else {
    $templateParams["titolo"] = "MangaParadise | Login";
    $templateParams['nome'] = "login-form.php";
    $templateParams["scripts"] = ["darkMode.js"];
    if (isset($_GET["msg"])) {
        $templateParams["messaggiologin"] = $_GET["msg"];
    }
}
require 'template/base.php';
?>