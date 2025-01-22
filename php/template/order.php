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
    <section class="order-manga">
        <h2>Prodotti Inclusi</h2>
        <?php if (empty($templateParams["ordine"]["prodotti"])): ?>
            <p>Non ci sono prodotti associati a questo ordine.</p>
        <?php else: ?>
            <ul class="manga-list">
                <?php foreach ($templateParams["ordine"]["prodotti"] as $manga): ?>
                    <li class="manga-item">
                        <h3><?php echo htmlspecialchars($manga["Titolo"]); ?></h3>
                        <p><?php echo htmlspecialchars($manga["Descrizione"]); ?></p>
                        <p><strong>Quantità:</strong> <?php echo intval($manga["Quantità"]); ?></p>
                        <p><strong>Prezzo unitario:</strong> €<?php echo number_format($manga["Prezzo_unitario"], 2); ?></p>
                        <p><strong>Totale:</strong> €<?php echo number_format($manga["Quantità"] * $manga["Prezzo_unitario"], 2); ?></p>
                        <img src="../img/Manga/<?php echo htmlspecialchars($manga["Immagine"]); ?>" alt="<?php echo htmlspecialchars($manga["Titolo"]); ?>" class="manga-image" />
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
    <a href="orders.php" class="button">Torna agli ordini</a>
<?php endif; ?>