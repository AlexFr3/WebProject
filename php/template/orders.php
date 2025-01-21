<?php 
if(empty($templateParams["orders"])) {
    echo "<p>Nessun ordine trovato.</p>";
} else {
    foreach($templateParams["orders"] as $ordine): ?>
        <section class="order-section">
            <h3>Ordine #<?php echo $ordine['idOrdine']; ?></h3>
            <p><strong>Data Ordine:</strong> <?php echo $ordine['Data_ordine']; ?></p>
            <p><strong>Stato:</strong> <?php echo $ordine['Stato']; ?></p>
        </section>
    <?php endforeach;
}
?>
