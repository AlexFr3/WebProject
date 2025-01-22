<?php 
require_once 'bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markRead'])) {
    if (!empty($_POST['notifiche'])) {
        $notificheIds = array_map('intval', $_POST['notifiche']); 

        try {
            
            if (count($notificheIds) === 1) {
                $query = "UPDATE Notifica SET Letta = 1 WHERE idNotifica = ?";
                $stmt = $dbh->prepare($query);
                $stmt->bind_param('i', $notificheIds[0]);
            } else {
                
                $placeholders = implode(',', array_fill(0, count($notificheIds), '?'));
                $query = "UPDATE Notifica SET Letta = 1 WHERE idNotifica IN ($placeholders)";
                $stmt = $dbh->prepare($query);
                $stmt->bind_param(str_repeat('i', count($notificheIds)), ...$notificheIds); // Bind dei parametri
            }
            
            
            if ($stmt->execute()) {
                $templateParams["notifichaLetta"] = "Le notifiche selezionate sono state segnate come lette.";
            } else {
                echo "<p>Errore nell'aggiornamento delle notifiche: " . $stmt->error . "</p>";
            }
        } catch (Exception $e) {
            echo "<p>Errore: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        $templateParams["notificaVuota"] = "Nessuna notifica selezionata.";
    }
} else {
    $templateParams["richestaVuota"] = "Richiesta non valida.";
}

$templateParams["titolo"] = "MangaParadise | Notifiche";
$templateParams["nome"] = "notifiche.php";
$templateParams["notifiche"] = $dbh->getNotifiche($_SESSION["email"]);
$templateParams["scripts"] = ["darkMode.js"];
require 'template/base.php';
?>