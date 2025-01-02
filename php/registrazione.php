        <?php
        require_once 'bootstrap.php';

        if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["conf-password"])){
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confPassword = $_POST["conf-password"];
            if($password != $confPassword){
                $templateParams["erroreregistrazione"] = "Le password non corrispondono";
            } else if($dbh->existsUserWithEmail($email)){
                $templateParams["erroreregistrazione"] = "Esiste già un utente associato alla mail specificata";
            } else{
                if($dbh->registerNewUser($nome, $cognome, $email, $password)){
                    header("location: login.php?msg=Utente+registrato+con+successo");
                } else {
                    $templateParams["erroreregistrazione"] = "Registrazione fallita";
                }
            }
        }


        $templateParams["titolo"] = "MangaParadise | Registrazione";
        $templateParams['nome'] = "register-form.php";
        require 'template/base.php';
        ?>