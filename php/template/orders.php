<?php foreach($templateParams["orders"] as $ordine): ?>
    <section class="order-section">
        <h3>Ordine #<?php echo $ordine['idOrdine']; ?></h3>
        <p><strong>Data Ordine:</strong> <?php echo $ordine['Data_ordine']; ?></p>
        <!-- <p><strong>Stato:</strong> <?php echo $ordine['Stato']; ?></p>-->
        <p><strong>Totale:</strong> €<?php echo $ordine['Totale']; ?></p>
    </section>
<?php endforeach; ?>
