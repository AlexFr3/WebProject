        <?php
        require_once 'bootstrap.php';

        if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["conf-password"])){
            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confPassword = $_POST["conf-password"];
            if(empty($nome)){
                $templateParams["erroreregistrazione"] = "È necessario specificare il nome!";
            } else if(empty($cognome)){
                $templateParams["erroreregistrazione"] = "È necessario specificare il cognome!";
            } else if(empty($email)){
                $templateParams["erroreregistrazione"] = "È necessario specificare una email!";
            } else if(empty($password)){
                $templateParams["erroreregistrazione"] = "La password non può essere vuota";
            } else if(strlen($password) < 8){
                $templateParams["erroreregistrazione"] = "La password deve contenere almeno 8 caratteri";
            } else if($password != $confPassword){
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