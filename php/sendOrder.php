<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("location: login.php");
}
if(!isUserSeller()){
    header("location: index.php");
}
if (!isset($_GET['idOrdine'])) {
    $msg = "Non è stato possibile spedire l'ordine";
    header("location: manageOrders.php?msg=".$msg);
} else {
    $idOrdine = intval($_GET['idOrdine']); 
    $ordine = $dbh->getOrderDetails($idOrdine);
    if(empty($ordine) || $ordine["Stato"]!=="In elaborazione"){    
        $msg = "Non è stato possibile spedire l'ordine";
        header("location: manageOrders.php?msg=".$msg);
    } else{
        $email = $ordine["Utente_Email"];
        if($dbh->sendOrder($idOrdine)){
            if($dbh->addSendingNotify($email, $idOrdine)){
                $msg = "L'ordine è stato spedito correttamente";
                header("location: manageOrders.php?msg=".$msg);
            } else {
                $msg = "Non è stato possibile inviare la notifica all'utente";
                header("location: manageOrders.php?msg=".$msg);
            }
        } else {
            $msg = "Non è stato possibile spedire l'ordine";
            header("location: manageOrders.php?msg=".$msg);
        }
    }
}
?>
