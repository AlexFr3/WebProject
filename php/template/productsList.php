<header>
    <a class="confirm-button" href="#">Inserisci prodotto</a>
</header>
<section>
    <h1>Manga</h1>
    <ul>
    <?php if (!empty($templateParams["Manga"])): ?>
      <?php foreach ($templateParams["Manga"] as $manga): ?>
        <li>
        <section>
            <article data-id="<?= htmlspecialchars($manga['idManga']) ?>">
              <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
                alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
              <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
              <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
              <p>Quantità: <?php echo($manga["Quantità"]); ?></p>
            </article>
            <a class="button" href="">Modifica</a>
            <a class="red-button" href="">Elimina</a>
            <!-- <input type="hidden" value="<?php echo ($manga['idManga']) ?>" />
            <input class="red-button" type="button" value="" />
            <input type="hidden" value="<?php echo ($manga['idManga']) ?>" />
            <input class="button" type="button" value="Modifica" />
          </section> -->
        </li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>Nessun manga disponibile al momento.</li>
    <?php endif; ?>
  </ul>
</section>