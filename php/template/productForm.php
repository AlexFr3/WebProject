        <?php 
            $manga = $templateParams["manga"]; 
            $azione = $templateParams["azione"];
        ?>
        <form action="processa-articolo.php" method="POST" enctype="multipart/form-data">
            <h1>Gestisci Prodotto</h1>
            <?php if($manga==null): ?>
            <p>Prodotto non trovato</p>
            <?php else: ?>
            <ul>
                <li>
                    <label for="titolo">Titolo:</label><input type="text" id="titolo" name="titolo" value="<?php echo $manga["titolo"]; ?>" />
                </li>
                <li>
                    <label for="voto">Voto:</label><input type="number" id="voto" name="voto" min="1" max="10" value="<?php echo $manga["voto"]; ?>" />
                </li>
                <li>
                    <label for="descrizione">Descrizione</label><textarea id="descrizione" name="descrizione"><?php echo $manga["descrizione"]; ?></textarea>
                </li>
                <li>
                    <label for="quantità">Quantità</label><input type="number" min="0" id="quantità" name="quantità" value="<?php echo $manga["quantità"]; ?>" />
                </li>
                <li>
                    <label for="Prezzo">Prezzo:</label><input type="number" min="0" id="Prezzo" name="Prezzo" value="<?php echo $manga["Prezzo"]; ?>" />
                </li>
                <li>
                    <label for="Data">Data di uscita:</label><input type="date" id="Data" name="Data" value="<?php echo $manga["Data_uscita"]; ?>" />
                </li>
                <li>
                    <?php if($templateParams["azione"]!=="elimina"): ?>
                    <label for="imgmanga">Immagine Manga</label><input type="file" name="imgmanga" id="imgmanga" />
                    <?php endif; ?>
                    <?php if($templateParams["azione"]!=="inserisci"): ?>
                    <img src="<?php echo "../img/".$manga["immagine"]; ?>" alt="" />
                    <?php endif; ?>
                </li>
                <li>
                    <?php foreach($templateParams["categorie"] as $categoria): ?>
                    <input type="checkbox" id="<?php echo $categoria["idCategoria"]; ?>" name="categoria_<?php echo $categoria["idCategoria"]; ?>" <?php 
                        if(in_array($categoria["idCategoria"], $manga["categorie"])){ 
                            echo ' checked="checked" '; 
                        } 
                    ?> /><label for="<?php echo $categoria["idCategoria"]; ?>"><?php echo $categoria["Descrizione"]; ?></label>
                    <?php endforeach; ?>
                </li>
                <li>
                    <?php foreach($templateParams["generi"] as $genere): ?>
                    <input type="checkbox" id="<?php echo $genere["idGenere"]; ?>" name="categoria_<?php echo $genere["idGenere"] ?>" <?php 
                        if(in_array($genere["idGenere"], $manga["generi"])){ 
                            echo ' checked="checked" '; 
                        } 
                    ?> /><label for="<?php echo $genere["idGenere"]; ?>"><?php echo $genere["Descrizione"]; ?></label>
                    <?php endforeach; ?>
                </li>
                <li>
                    <input type="submit" name="submit" value="<?php echo $azione; ?> Articolo" />
                    <a href="products.php">Annulla</a>
                </li>
            </ul>
                <?php if($templateParams["azione"]!=="inserisci"): ?>
                <input type="hidden" name="idarticolo" value="<?php echo $manga["idManga"]; ?>" />
                <input type="hidden" name="categorie" value="<?php echo implode(",", $manga["categorie"]); ?>" />
                <input type="hidden" name="generi" value="<?php echo implode(",", $manga["generi"]); ?>" />
                <input type="hidden" name="oldimg" value="<?php echo $manga["immagine"]; ?>" />
                <?php endif;?>

                <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />
            <?php endif;?>
        </form>