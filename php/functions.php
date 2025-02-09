<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['email']);
}

function isUserSeller(){
    if(!isUserLoggedIn()){
        return false;
    } else{
        return $_SESSION["venditore"]==1;
    }
}

function registerLoggedUser($user){
    if (is_array($user)) {
        $_SESSION["email"] = $user["email"];
        $_SESSION["venditore"] = $user["venditore"];
        $_SESSION["nome"] = $user["nome"];
        $_SESSION["cognome"] = $user["cognome"];
    }
}

function unlogUser(){
    unset($_SESSION["email"]);
    unset($_SESSION["venditore"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["cognome"]);
}

function getEmptyManga(){
    return array("idManga" => "", "voto" => "", "titolo" => "", "descrizione" => "", "quantità" => "", "immagine" => "", "Data_uscita" => "", "Prezzo" => "", "categorie" => array(), "generi" => array());
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function deleteImg($path, $image){
    unlink($path.$image);
}

?>