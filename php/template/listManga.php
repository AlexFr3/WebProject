<section>
    <h2>FILTRA PER</h2>
    <p>CATEGORIA</p>
    <form action="#" method="post">
        <input type="checkbox" id="seinen" name="seinen" value="Seinen"/>
        <label for="seinen"> Seinen</label><br>
        <input type="checkbox" id="shounen" name="shounen" value="Shounen"/>
        <label for="shounen">Shounen</label><br>
        <input type="checkbox" id="manhwa" name="manhwa" value="Manhwa"/>
        <label for="manhwa">Manhwa</label>
    </form>
</section>
<section>
    <p>PREZZO</p>
    <div class="container mt-5">
        <label for="customRange2" class="form-label">
            0$ - 100$ (Valore selezionato: <span id="rangeValue">50</span>$)
        </label>
        <input type="range" class="form-range" min="0" max="100" value="50" id="customRange2" oninput="updateValue(this.value)"/>
    </div>

    <script>
        
        function updateValue(value) {
            document.getElementById('rangeValue').textContent = value;
        }
    </script>
</section>
<section>
    <p>GENERE</p>
    <form action="#" method="post">
        <input type="checkbox" id="azione" name="azione" value="Azione"/>
        <label for="azione"> Azione</label><br>
        <input type="checkbox" id="drammatico" name="drammatico" value="Drammatico"/>
        <label for="drammatico">Drammatico</label><br>
        <input type="checkbox" id="avventura" name="avventura" value="Avventura"/>
        <label for="avventura">Avventura</label>
        <input type="checkbox" id="fantasy" name="fantasy" value="Fantasy"/>
        <label for="fantasy">Fantasy</label>
        <input type="checkbox" id="commedia" name="commedia" value="Commedia"/>
        <label for="commedia">Commedia</label>
    </form>
</section>
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