<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/HomeImage.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/HomeImage2.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section>
  <h1>Ultime Uscite</h1>
  <ul>
    <?php if (!empty($templateParams["LatestManga"])): ?>
      <?php foreach ($templateParams["LatestManga"] as $manga): ?>
        <li>
          <section>
            <article data-id="<?= htmlspecialchars($manga['idManga']) ?>">
              <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
                alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
              <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
              <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
              <input type="hidden" value="<?php echo ($manga['idManga']) ?>" />
            </article>
            <input class="button" type="button" value="<?php if ($manga['Quantità'] > 0) {
              echo ('Aggiungi al carrello');
            } else {
              echo ('Non disponibile');
            } ?>" <?php if ($manga['Quantità'] <= 0) {
               echo ("disabled");
             } ?> />

          </section>
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
          <article data-id="<?= htmlspecialchars($manga['idManga']) ?>">
            <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
              alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
            <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
            <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
            <input class="button" type="button" value="<?php if ($manga['Quantità'] > 0) {
              echo ('Aggiungi al carrello');
            } else {
              echo ('Non disponibile');
            } ?>" <?php if ($manga['Quantità'] <= 0) {
               echo ("disabled");
             } ?> />
          </article>
        </li>
      <?php endforeach; ?>
    <?php else: ?>
      <li>Nessun manga disponibile al momento.</li>
    <?php endif; ?>
  </ul>
</section>