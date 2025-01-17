<section>
  <h1>Manga</h1>
  <p>Tutti i manga sono protetti in una perfetta bustina protettiva su misura.</p>
  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67"/>
  </svg>
  <button type="button" class="btn btn-outline-info rounded-pill">Filtra per</button>
</section>

<section class="filter-overlay">
  <form action="#" method="post" class="filter-form">
  <h3>Filtra Manga</h3>
    <!-- Categoria -->
    <h4 class="mb-3">Categoria</h4>
    <ul class="list-unstyled">
    <?php foreach ($templateParams["Categories"] as $category): ?>
        <li>
        <input class="form-check-input" type="checkbox" id="<?= htmlspecialchars($category['Descrizione']) ?>" name="categories[]" value="<?= htmlspecialchars($category['Descrizione']) ?>" />
        <label class="form-check-label" for="<?= htmlspecialchars($category['Descrizione']) ?>"><?= htmlspecialchars($category['Descrizione']) ?></label>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Prezzo -->
    <h4 class="mt-4 mb-3">Prezzo</h4>
    <ul class="list-unstyled">
      <li>
        <label for="priceRange" class="form-label">
         <span class="rangeValue">50</span>$
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
    <h4 class="mt-4 mb-3">Genere</h4>
    <ul class="list-unstyled">
    <?php foreach ($templateParams["Genres"] as $type): ?>
        <li>
        <input class="form-check-input" type="checkbox" id="<?= htmlspecialchars($type['Descrizione']) ?>" name="genres[]" value="<?= htmlspecialchars($type['Descrizione']) ?>" />
        <label class="form-check-label" for="<?= htmlspecialchars($type['Descrizione']) ?>"><?= htmlspecialchars($type['Descrizione']) ?></label>
        </li>
      <?php endforeach; ?>
    </ul>

    
    <button type="submit" class="btn btn-primary mt-4 rounded-pill">Filtra</button>
  </form>
</section>

<script>
  function updateValue(value) {
    document.querySelector('.rangeValue').textContent = value;
  }
</script>

<script>
const openButton = document.querySelector('.btn-outline-info.rounded-pill');
const overlay = document.querySelector('.filter-overlay');
const content = document.querySelector('section:first-of-type');
openButton.addEventListener('click', () => {
  overlay.style.display = 'flex';
  content.classList.add('blur');  
});

// Chiudi il filtro cliccando fuori dalla form
overlay.addEventListener('click', (e) => {
  if (e.target === overlay) {
    overlay.style.display = 'none';
    content.classList.remove('blur'); 
  }
});
</script>


<section>
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