<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_POST["action"]) || !isUserSeller()){
    header("location: products.php");
}
if($_POST["action"]=="inserisci"){
    //Inserisco
    $titolo = htmlspecialchars($_POST["titolo"]);
    $voto = $_POST["voto"];
    $descrizione = htmlspecialchars($_POST["descrizione"]);
    $quantità = $_POST["quantità"];
    $prezzo = $_POST["prezzo"];
    $data = $_POST["Data"];


    $categorie = $dbh->getAllCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idCategoria"]])){
            array_push($categorie_inserite, $categoria["idCategoria"]);
        }
    }

    $generi = $dbh->getAllGenres();
    $generi_inseriti = array();
    foreach($generi as $genere){
        if(isset($_POST["genere_".$genere["idGenere"]])){
            array_push($generi_inseriti, $genere["idGenere"]);
        }
    }

    list($result, $msg) = uploadImage("../img/manga/", $_FILES["imgmanga"]);
    if($result != 0){
        $imgManga = $msg;
        $id = $dbh->insertManga($voto, $titolo, $descrizione, $quantità, $imgManga, $data, $prezzo);
        if($id!=false){
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoryOfManga($id, $categoria);
            }
            foreach($generi_inseriti as $genere){
                $ris = $dbh->insertGenreOfManga($id, $genere);
            }
            $msg = "L'inserimento è stato completato correttamente!";
        }
        else{
            $msg = "Non è stato possibile completare l'inserimento!";
        }
        
    }
    header("location: products.php?formmsg=".$msg);
}

if($_POST["action"]==="modifica"){
    //modifico
    $titoloarticolo = htmlspecialchars($_POST["titoloarticolo"]);
    $testoarticolo = htmlspecialchars($_POST["testoarticolo"]);
    $anteprimaarticolo = htmlspecialchars($_POST["anteprimaarticolo"]);
    $anteprimaarticolo = $_POST["anteprimaarticolo"];
    $autore = $_SESSION["idautore"];

    if(isset($_FILES["imgarticolo"]) && strlen($_FILES["imgarticolo"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticolo"]);
        if($result == 0){
            header("location: login.php?formmsg=".$msg);
        }
        $imgarticolo = $msg;

    }
    else{
        $imgarticolo = $_POST["oldimg"];
    }
    $dbh->updateArticleOfAuthor($idarticolo, $titoloarticolo, $testoarticolo, $anteprimaarticolo, $imgarticolo, $autore);

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }
    $categorievecchie = explode(",", $_POST["categorie"]);

    $categoriedaeliminare = array_diff($categorievecchie, $categorie_inserite);
    foreach($categoriedaeliminare as $categoria){
        $ris = $dbh->deleteCategoryOfArticle($idarticolo, $categoria);
    }
    $categoriedainserire = array_diff($categorie_inserite, $categorievecchie);
    foreach($categoriedainserire as $categoria){
        $ris = $dbh->insertCategoryOfArticle($idarticolo, $categoria);
    }

    $msg = "Modifica completata correttamente!";
    header("location: login.php?formmsg=".$msg);
}

if($_POST["action"]==="elimina"){
    //cancello
    echo "entro";
    $oldImage = $_POST["oldimg"];
    $idManga = $_POST["idManga"];
    $dbh->deleteCategoriesOfManga($idManga);
    $dbh->deleteGenresOfManga($idManga);
    $dbh->deleteMangaInCarts($idManga);
    $dbh->deleteMangaInOrders($idManga);

    $dbh->deleteManga($idManga);
    deleteImg("../img/manga/", $oldImage);
    
    $msg = "La cancellazione è stata completata correttamente!";
    header("location: products.php?formmsg=".$msg);
}

?>