<?php if(isset($templateParams["messaggiocarrello"])): ?>
            <div class="alert text-center <?php if(str_starts_with($templateParams["messaggiocarrello"], "L") || str_starts_with($templateParams["messaggiocarrello"], "G")){
                echo("alert-success");
             } else{
                echo("alert-danger");
             }?>" role="alert"><p class="fw-bold fs-2" ><?php echo $templateParams["messaggiocarrello"]; ?></p></div>
<?php endif; ?>
<section>
   <h1>Carrello</h1>
   <ul>
    <?php if (!empty($templateParams["manga-in-carrello"])): ?>
      <?php foreach ($templateParams["manga-in-carrello"] as $manga): ?>
        <li>
          <article>
            <img src="../img/Manga/<?= htmlspecialchars($manga['Immagine']) ?>"
              alt="<?= htmlspecialchars($manga['Titolo']) ?>" />
            <h2><?= htmlspecialchars($manga['Titolo']) ?></h2>
            <p>Prezzo: €<?= number_format($manga['Prezzo'], 2) ?></p>
            <input type="hidden" value="<?php echo($manga['idManga']) ?>" />
            <input class="button-manga" type="button" value="✖" />
          </article>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
  <footer><a href="emptyCart.php">Svuota il carrello</a></footer>
</section>
<section>
   <h1>Riepilogo</h1>
   <p class="lead fw-bold"> Numero Articoli: <?php echo($templateParams["numero-articoli"]) ?><br/>Prezzo Totale: <?php echo($templateParams["prezzo-totale"]) ?>€</p>
   <footer><a class="confirm-button" href="#">Procedi all'ordine</a></footer>
</section>
