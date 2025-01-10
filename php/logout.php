<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn()){
    header("location: profilo.php");
} else{
    unlogUser();
    header("location: login.php?msg=Logout+eseguito+con+successo");
}
require 'template/base.php';
?>