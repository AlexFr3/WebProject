<section>
  <h1>Novità</h1>
  <section>
    <section>
      <img src="../img/HomeImage.jpg" id="slide-1" alt="Home Image" />
      <img src="../img/HomeImage2.png" id="slide-2" alt="Home Image2" />
    </section>
    <section>
      <a href="#slide-1"></a>
      <a href="#slide-2"></a>
    </section>
  </section>
</section>
  <section>
    <h1>Ultime Uscite</h1>
    <ul>
      <?php if (!empty($templateParams["LatestManga"])): ?>
        <?php foreach ($templateParams["LatestManga"] as $manga): ?>
          <li>
            <article>
              <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
                alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
              <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
              <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
              <input type="button" value="Aggiungi al carrello" />
            </article>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li>Nessun manga disponibile al momento.</li>
      <?php endif; ?>
    </ul>
  </section>
  <section>
    <h1>I più votati</h1>
    <ul>
      <?php if (!empty($templateParams["TopRatedManga"])): ?>
        <?php foreach ($templateParams["TopRatedManga"] as $manga): ?>
          <li>
            <article>
              <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
                alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
              <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
              <p>Voto: <?= htmlspecialchars($manga['Voto']) ?>/10</p>
              <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
              <input type="button" value="Aggiungi al carrello" />
            </article>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li>Nessun manga disponibile al momento.</li>
      <?php endif; ?>
    </ul>
  </section>