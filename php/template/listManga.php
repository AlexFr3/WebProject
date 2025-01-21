<section>
  <h1>Manga</h1>
  <p>Tutti i manga sono protetti in una perfetta bustina protettiva su misura.</p>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown"
      aria-expanded="false">
      Ordina per
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="listMangaIndex.php?orderBy=voti">Voti</a></li>
      <li><a class="dropdown-item" href="listMangaIndex.php?orderBy=data">Data uscita</a></li>
      <li><a class="dropdown-item" href="listMangaIndex.php?orderBy=prezzo">Prezzo</a></li>
    </ul>
  </div>
  <button type="button" class="btn btn-outline-info rounded-pill">Filtra per</button>
</section>

<section class="filter-overlay">
  <form action="listMangaIndex.php" method="post" class="filter-form">
    <h2>Filtra Manga</h2>
    <!-- Categoria -->
    <h3 class="mb-3">Categoria</h3>
    <ul class="list-unstyled">
      <?php foreach ($templateParams["Categories"] as $category): ?>
        <li>
          <input class="form-check-input" type="checkbox" id="<?= htmlspecialchars($category['Descrizione']) ?>"
            name="categories[]" value="<?= htmlspecialchars($category['idCategoria']) ?>" />
          <label class="form-check-label"
            for="<?= htmlspecialchars($category['Descrizione']) ?>"><?= htmlspecialchars($category['Descrizione']) ?></label>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Prezzo -->
    <h3 class="mt-4 mb-3">Prezzo</h3>
    <ul class="list-unstyled">
      <li>
        <label for="priceRange" class="form-label">
          <span class="rangeValue">50</span>€
        </label>
        <input type="range" class="form-range" min="0" max="100" step="1" name="price" id="priceRange" value="50"
          oninput="updateValue(this.value)" />
      </li>
    </ul>

    <!-- Genere -->
    <h3 class="mt-4 mb-3">Genere</h3>
    <ul class="list-unstyled">
      <?php foreach ($templateParams["Genres"] as $type): ?>
        <li>
          <input class="form-check-input" type="checkbox" id="<?= htmlspecialchars($type['Descrizione']) ?>"
            name="genres[]" value="<?= htmlspecialchars($type['idGenere']) ?>" />
          <label class="form-check-label"
            for="<?= htmlspecialchars($type['Descrizione']) ?>"><?= htmlspecialchars($type['Descrizione']) ?></label>
        </li>
      <?php endforeach; ?>
    </ul>

    <button type="submit" class="btn btn-primary mt-4 rounded-pill">Filtra</button>
  </form>
</section>

<section>
  <ul>
    <?php if (!empty($templateParams["allManga"])): ?>
      <?php foreach ($templateParams["allManga"] as $manga): ?>
        <li>
          <section>
            <article data-id="<?= htmlspecialchars($manga['idManga']) ?>">
              <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
                alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
              <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
              <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
            </article>
            <input type="hidden" value="<?php echo ($manga['idManga']) ?>" />
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
