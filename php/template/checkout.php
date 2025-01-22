<section>
    <h2>Inserisci i dati della carta</h2>
    <form action="#" method="post">
    <ul>
        <!-- Nome sulla carta -->
        <li>
        <label for="card-name">Nome sulla carta</label>
        <input type="text" id="card-name" name="cardName" placeholder="Mario Rossi" />
        </li>

        <!-- Numero della carta -->
        <li>
        <label for="card-number">Numero della carta</label>
        <input type="text" id="card-number" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" />
        </li>

        <!-- Data di scadenza -->
        <li>
        <label for="expiry-date">Data di scadenza</label>
        <input type="month" id="expiry-date" name="expiryDate" />
        </li>

        <!-- CVV -->
        <li>
        <label for="cvv">CVV</label>
        <input type="password" id="cvv" name="cvv" placeholder="123" maxlength="3" />
        </li>

        <!-- Pulsante per inviare -->
        <li>
        <input class="button" type="submit" name="submitButton" value="Paga" />
        </li>
    </ul>
    </form>

    <?php 
    require_once 'bootstrap.php';

    try {
        // Controlla che il metodo di richiesta sia POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitButton"])) {
            // Controlla che i dati del modulo siano stati inviati e siano validi
            if (isset($_POST["cardName"], $_POST["cardNumber"], $_POST["expiryDate"], $_POST["cvv"])) {
            
                // Recupera i manga nel carrello
                $mangaInCar = $dbh->getMangaInCart($_SESSION["email"]);
                // Aggiorna la quantità dei manga e rimuovili dal carrello
                foreach ($mangaInCar as $manga) {
                    $dbh->updateMangaQuantityAndCart($manga["idManga"], $manga["Quantità_In_Carrello"]);
                }
                
                // Calcola il prezzo totale
                $totalPrice = $dbh->getTotalPrice($_SESSION["email"]);
                
                // Crea l'ordine
                $dbh->createOrder($_SESSION["email"], $mangaInCar, $totalPrice);

                // Mostra un messaggio di conferma
                echo "<p>Ordine completato con successo! Grazie per il tuo acquisto.</p>";
            } else {
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                throw new Exception("Dati del modulo mancanti o incompleti.");
            }
        }
    } catch (Exception $e) {
        // Mostra un messaggio di errore
        echo "<p>Errore durante l'elaborazione dell'ordine: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    ?>
</section>