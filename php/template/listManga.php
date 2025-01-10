<section class="container mt-4">
  <form action="#" method="post" class="p-4 border rounded shadow-sm">
  <h3>Filtra Manga</h3>
    <!-- Categoria -->
    <h3 class="mb-3">Categoria</h3>
    <ul class="list-unstyled">
      <li>
        <input class="form-check-input" type="checkbox" id="seinen" name="categories[]" value="Seinen" />
        <label class="form-check-label" for="seinen">Seinen</label>
      </li>
      <li>
        <input class="form-check-input" type="checkbox" id="shounen" name="categories[]" value="Shounen" />
        <label class="form-check-label" for="shounen">Shounen</label>
      </li>
      <li>
        <input class="form-check-input" type="checkbox" id="manhwa" name="categories[]" value="Manhwa" />
        <label class="form-check-label" for="manhwa">Manhwa</label>
      </li>
    </ul>

    <!-- Prezzo -->
    <h3 class="mt-4 mb-3">Prezzo</h3>
    <ul class="list-unstyled">
      <li>
        <label for="priceRange" class="form-label">
         <span id="rangeValue">50</span>$
        </label>
        <input 
          type="range" 
          class="form-range" 
          min="0" 
          max="100" 
          step="1" 
          name="price" 
          id="priceRange" 
          value="50" 
          oninput="updateValue(this.value)" />
      </li>
    </ul>

    <!-- Genere -->
    <h3 class="mt-4 mb-3">Genere</h3>
    <ul class="list-unstyled">
      <li>
        <input class="form-check-input" type="checkbox" id="azione" name="genres[]" value="Azione" />
        <label class="form-check-label" for="azione">Azione</label>
      </li>
      <li>
        <input class="form-check-input" type="checkbox" id="drammatico" name="genres[]" value="Drammatico" />
        <label class="form-check-label" for="drammatico">Drammatico</label>
      </li>
      <li>
        <input class="form-check-input" type="checkbox" id="avventura" name="genres[]" value="Avventura" />
        <label class="form-check-label" for="avventura">Avventura</label>
      </li>
      <li>
        <input class="form-check-input" type="checkbox" id="fantasy" name="genres[]" value="Fantasy" />
        <label class="form-check-label" for="fantasy">Fantasy</label>
      </li>
      <li>
        <input class="form-check-input" type="checkbox" id="commedia" name="genres[]" value="Commedia" />
        <label class="form-check-label" for="commedia">Commedia</label>
      </li>
    </ul>

    <!-- Pulsante Submit -->
    <button type="submit" class="btn btn-primary mt-4">Filtra</button>
  </form>
</section>

<script>
  function updateValue(value) {
    document.getElementById('rangeValue').textContent = value;
  }
</script>

<section>
  <h1>Manga</h1>
  <p>Tutti i manga sono protetti in una perfetta bustina protettiva su misura.</p>
  <ul>
    <?php if (!empty($templateParams["allManga"])): ?>
      <?php foreach ($templateParams["allManga"] as $manga): ?>
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