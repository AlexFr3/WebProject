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
            <p>Quantità: <?php echo($manga["Quantità_In_Carrello"]) ?></p>
            <input type="hidden" value="<?php echo($manga['idManga']) ?>" />
            <input class="button-manga button-manga-quantity increase-quantity" type="button" value="+" />
            <input type="hidden" value="<?php echo($manga['idManga']) ?>" />
            <input class="button-manga button-manga-quantity decrease-quantity" type="button" value="-" <?php if($manga["Quantità_In_Carrello"] <= 1){ echo("disabled"); } ?>/>
            <input type="hidden" value="<?php echo($manga['idManga']) ?>" />
            <input class="button-manga remove-from-cart" type="button" value="✖" />
          </article>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
  <a class="red-button" href="emptyCart.php">Svuota il carrello</a>
</section>
<section>
   <h1>Riepilogo</h1>
   <p class="lead fw-bold"> Numero Articoli: <?php echo($templateParams["numero-articoli"]) ?><br/>Prezzo Totale: <?php echo($templateParams["prezzo-totale"]) ?>€</p>
   <a class="confirm-button" href="#">Procedi all'ordine</a>
</section>
