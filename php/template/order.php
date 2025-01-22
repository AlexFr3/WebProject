<h1>Dettagli Ordine</h1>
<?php if (empty($templateParams["ordine"])): ?>
    <p>Dettagli dell'ordine non disponibili.</p>
<?php else: ?>
    <section class="order-summary">
        <h2>Riepilogo Ordine</h2>
        <p><strong>Numero Ordine:</strong> #<?php echo htmlspecialchars($templateParams["ordine"]["idOrdine"]); ?></p>
        <p><strong>Data Ordine:</strong> <?php echo htmlspecialchars($templateParams["ordine"]["Data_ordine"]); ?></p>
        <p><strong>Stato:</strong> <?php echo htmlspecialchars($templateParams["ordine"]["Stato"]); ?></p>
        <p><strong>Totale:</strong> €<?php echo number_format($templateParams["ordine"]["Totale"], 2); ?></p>
    </section>
    <section>
        <h2>Prodotti Inclusi</h2>
        <?php if (empty($templateParams["ordine"]["prodotti"])): ?>
            <p>Non ci sono prodotti associati a questo ordine.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($templateParams["ordine"]["prodotti"] as $manga): ?>
                    <li>
                        <p><?php echo htmlspecialchars($manga["Titolo"]); ?></p>
                        <p>Quantità: <?php echo intval($manga["Quantità"]); ?></p>
                        <img src="../img/Manga/<?php echo htmlspecialchars($manga["Immagine"]); ?>" alt="<?php echo htmlspecialchars($manga["Titolo"]); ?>" class="manga-image" />
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
    <a href="ordersIndex.php" class="button">Torna agli ordini</a>
<?php endif; ?>