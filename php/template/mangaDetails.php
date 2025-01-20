<?php if (isset($templateParams["manga"])): ?>
    <?php $manga = $templateParams["manga"]; ?>

    <section class="manga-details">
        <h1><?php echo htmlspecialchars($manga["Titolo"]); ?></h1>
        
        <article class="manga-info">
            <img src="../img/Manga/<?php echo htmlspecialchars($manga["Immagine"]); ?>" alt="<?php echo htmlspecialchars($manga["Titolo"]); ?>" class="manga-image">
            
            <section>
                <p><strong>Descrizione:</strong> <?php echo nl2br(htmlspecialchars($manga["Descrizione"])); ?></p>
                <p><strong>Prezzo:</strong> €<?php echo number_format($manga["Prezzo"], 2); ?></p>
                <p><strong>Quantità disponibile:</strong> <?php echo htmlspecialchars($manga["Quantità"]); ?></p>
                <p><strong>Data di uscita:</strong> <?php echo date("d/m/Y", strtotime($manga["Data_uscita"])); ?></p>
            </section>
        </article>
        
        <section class="action-buttons">
            <a href="#" class="button">Aggiungi al carrello</a>
            <a href="index.php" class="btn btn-secondary">Torna alla home</a>
        </section>
    </section>

<?php else: ?>
    <div class="error-message">
        <h2>Manga non trovato</h2>
        <p>Il manga che stai cercando non è disponibile. Torna alla <a href="index.php">home</a>.</p>
    </div>
<?php endif; ?>
