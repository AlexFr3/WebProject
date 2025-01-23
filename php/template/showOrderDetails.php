<h1>Dettagli Ordine</h1>
<?php if (empty($templateParams["ordine"])): ?>
    <p>Dettagli dell'ordine non disponibili.</p>
<?php else: ?>
    <article class="order-details">
        <section class="order-summary">
            <h2>Riepilogo Ordine</h2>
            <p><strong>Numero Ordine:</strong> #<?php echo htmlspecialchars($templateParams["ordine"]["idOrdine"]); ?></p>
            <p><strong>Data Ordine:</strong> <?php echo htmlspecialchars($templateParams["ordine"]["Data_ordine"]); ?></p>
            <p><strong>Totale:</strong> €<?php echo number_format($templateParams["ordine"]["Totale"], 2); ?></p>
        </section>

        <section class="progress-container">
            <h2>Stato Ordine</h2>
            <p><?php echo htmlspecialchars($templateParams["ordine"]["Stato"]); ?></p>

            <img class="track-img-icon" src="../img/truck.svg" alt="In elaborazione">
            <progress id="order-progress" class="order-progress" value="0" max="100"
                data-status="<?php echo htmlspecialchars($templateParams['ordine']['Stato']); ?>"></progress>
            <img class="track-img-icon" src="../img/home.svg" alt="In elaborazione">
        </section>
    </article>
    <section class="pt-5">
        <h2>Prodotti Inclusi</h2>
        <?php if (empty($templateParams["ordine"]["prodotti"])): ?>
            <p>Non ci sono prodotti associati a questo ordine.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($templateParams["ordine"]["prodotti"] as $manga): ?>
                    <li>
                        <p><?php echo htmlspecialchars($manga["Titolo"]); ?></p>
                        <p>Quantità: <?php echo intval($manga["Quantità"]); ?></p>
                        <img src="../img/Manga/<?php echo htmlspecialchars($manga["Immagine"]); ?>"
                            alt="<?php echo htmlspecialchars($manga["Titolo"]); ?>" class="manga-image" />
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
    <?php if($templateParams['ordine']['Stato'] ==='In elaborazione'): ?>
    <p><a href="#" class="confirm-button">Spedito</a></p>
    <?php else: ?>
    <p><a href="#" class="confirm-button">Consegnato</a></p>
    <?php endif; ?>
    <p><a href="manageOrders.php" class="button">Torna alla gestione ordini</a></p>
<?php endif; ?>