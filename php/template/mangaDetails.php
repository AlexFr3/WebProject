<?php if (isset($templateParams["manga"])): ?>
    <?php $manga = $templateParams["manga"]; ?>

    <section>
        <section class="manga-details">
            <h1><?php echo htmlspecialchars($manga["Titolo"]); ?></h1>
            <img class="img-manga manga-image" src="../img/Manga/<?php echo htmlspecialchars($manga["Immagine"]); ?>"
                alt="<?php echo htmlspecialchars($manga["Titolo"]); ?>" />
        </section>
        <section>
            <p><strong>Descrizione:</strong> <?php echo nl2br(htmlspecialchars($manga["Descrizione"])); ?></p>
            <p><strong>Prezzo:</strong> €<?php echo number_format($manga["Prezzo"], 2); ?></p>
            <p><strong>Quantità disponibile:</strong> <?php echo htmlspecialchars($manga["Quantità"]); ?></p>
            <p><strong>Data di uscita:</strong> <?php echo date("d/m/Y", strtotime($manga["Data_uscita"])); ?></p>
        </section>

        <section class="action-buttons">
            <input type="hidden" value="<?php echo ($manga['idManga']) ?>" />
            <input class="button" type="button" value="<?php if ($manga['Quantità'] > 0) {
                echo ('Aggiungi al carrello');
            } else {
                echo ('Non disponibile');
            } ?>" <?php if ($manga['Quantità'] <= 0) {
                 echo ("disabled");
             } ?> />
            <a href="index.php" class="btn btn-secondary rounded-pill fs-8">Torna alla home</a>
        </section>
    </section>

<?php else: ?>
    <section>
        <h2>Manga non trovato</h2>
        <p>Il manga che stai cercando non è disponibile. Torna alla <a href="index.php">home</a>.</p>
    </section>
<?php endif; ?>