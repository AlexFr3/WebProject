<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
} else{
    if(!isset($_GET["idManga"]) || !isset($_GET["action"])){
        header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+modificare+la+quantità+dell'articolo");
    } else{
        $idManga = $_GET["idManga"];
        $action = $_GET["action"];
        if(!$dbh->isMangaInCart($_SESSION["email"], $idManga)){
            header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+trovare+l'articolo+nel+carrello");
        } else{
            if($action!=="decrease" && $action!=="increase"){
                header("location: shoppingCartIndex.php");
            } else{
                if($action==="decrease"){
                    if($dbh->getQuantityInCart($_SESSION["email"], $idManga) <= 1){
                        header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+diminuire+la+quantità+dell'articolo");
                    } else{
                        if($dbh->changeQuantityInCart($_SESSION["email"], $idManga, false)){
                            header("location: shoppingCartIndex.php?msg=La+quantità+dell'articolo+è+stata+diminuita+correttamente");
                        } else{
                            header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+diminuire+la+quantità+dell'articolo");
                        }
                    }
                } else if($action==="increase"){
                    if($dbh->getQuantityInCart($_SESSION["email"], $idManga) >= $dbh->getQuantity($idManga)){
                        header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+aumentare+la+quantità+dell'articolo");
                    } else{
                        if($dbh->changeQuantityInCart($_SESSION["email"], $idManga, true)){
                            header("location: shoppingCartIndex.php?msg=La+quantità+dell'articolo+è+stata+aumentata+correttamente");
                        } else{
                            header("location: shoppingCartIndex.php?msg=Non+è+stato+possibile+aumentata+la+quantità+dell'articolo");
                        }
                    }
                }
            }
        }
    }
}


?>