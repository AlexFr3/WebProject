<?php if (isset($templateParams["messaggio"])): ?>
  <div class="alert text-center <?php if (str_starts_with($templateParams["messaggio"], "L") || str_starts_with($templateParams["messaggio"], "G")) {
    echo ("alert-success");
  } else {
    echo ("alert-danger");
  } ?>" role="alert">
    <p class="fw-bold fs-2"><?php echo $templateParams["messaggio"]; ?></p>
  </div>
<?php endif; ?>
<header>
    <a class="confirm-button" href="manageProducts.php?action=inserisci">Inserisci prodotto</a>
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
            <a class="button button-inline" href="manageProducts.php?action=modifica&idManga=<?php echo($manga["idManga"]); ?>">Modifica</a>
            <a class="red-button button-inline" href="manageProducts.php?action=elimina&idManga=<?php echo($manga["idManga"]); ?>">Elimina</a>
        </section>
        </li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>Nessun manga disponibile al momento.</li>
    <?php endif; ?>
  </ul>
</section>