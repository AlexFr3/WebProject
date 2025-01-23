<h1>Gestione ordini ricevuti</h1>
<?php if (isset($templateParams["messaggio"])): ?>
  <div class="alert text-center <?php if (str_starts_with($templateParams["messaggio"], "L") || str_starts_with($templateParams["messaggio"], "G")) {
    echo ("alert-success");
  } else {
    echo ("alert-danger");
  } ?>" role="alert">
    <p class="fw-bold fs-2"><?php echo $templateParams["messaggio"]; ?></p>
  </div>
<?php endif; ?>
<section>
    <h2>Ordini in elaborazione</h2>
    <?php if (empty($templateParams["ordiniDaSpedire"])): ?>
        <p>Non sono presenti ordini da spedire.</p>
    <?php else: ?>
        <?php foreach ($templateParams["ordiniDaSpedire"] as $ordine): ?>
            <article class="order">
                <section class="order-data">
                    <h3>Numero ordine #<?php echo $ordine['idOrdine']; ?></h3>
                    <p><strong>Data Ordine:</strong> <?php echo $ordine['Data_ordine']; ?></p>
                    <p><strong>Stato:</strong> <?php echo $ordine['Stato']; ?></p>
                    <p><strong>Totale:</strong> €<?php echo $ordine['Totale']; ?></p>
                    <a href="orderDetails.php?idOrdine=<?php echo $ordine['idOrdine']; ?>" class="button">Dettagli ordine</a>
                    
                </section>
                <section class="order-img-icon">
                    <img src="../img/parcel.svg" alt="<?php echo $ordine['Stato']; ?>" />
                </section>
                <a href="sendOrder.php?idOrdine=<?php echo $ordine['idOrdine']; ?>" class="confirm-button">Spedito</a>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
<section>
    <h2>Ordini spediti</h2>
    <?php if (empty($templateParams["ordiniDaConsegnare"])): ?>
        <p>Non sono presenti ordini da consegnare.</p>
    <?php else: ?>
        <?php foreach ($templateParams["ordiniDaConsegnare"] as $ordine): ?>
            <article class="order">
                <section class="order-data">
                    <h3>Numero ordine #<?php echo $ordine['idOrdine']; ?></h3>
                    <p><strong>Data Ordine:</strong> <?php echo $ordine['Data_ordine']; ?></p>
                    <p><strong>Stato:</strong> <?php echo $ordine['Stato']; ?></p>
                    <p><strong>Totale:</strong> €<?php echo $ordine['Totale']; ?></p>
                    <a href="orderDetails.php?idOrdine=<?php echo $ordine['idOrdine']; ?>" class="button">Dettagli ordine</a>
                </section>
                <section class="order-img-icon">
                    <img src="../img/truck.svg" alt="<?php echo $ordine['Stato']; ?>" />
                </section>
                <a href="" class="confirm-button">Consegnato</a>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>