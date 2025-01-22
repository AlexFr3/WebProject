<section>
    <h2>Inserisci i dati della carta</h2>
    <form action="#" method="post">
    <ul>
        
        <li>
        <label for="card-name">Nome sulla carta</label>
        <input type="text" id="card-name" name="cardName" placeholder="Mario Rossi" required />
        </li>

        <li>
        <label for="card-number">Numero della carta</label>
        <input type="text" id="card-number" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required pattern="\d{4} \d{4} \d{4} \d{4}"/>
        </li>

        <li>
        <label for="expiry-date">Data di scadenza</label>
        <input type="month" id="expiry-date" name="expiryDate" required/>
        </li>

        <li>
        <label for="cvv">CVV</label>
        <input type="password" id="cvv" name="cvv" placeholder="123" maxlength="3" required pattern="\d{3}"/>
        </li>

        <li>
        <input class="button" type="submit" name="submitButton" value="Paga" />
        </li>
    </ul>
    </form>

    <?php 
    require_once 'bootstrap.php';

    try {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitButton"])) {
            
            if (isset($_POST["cardName"], $_POST["cardNumber"], $_POST["expiryDate"], $_POST["cvv"])) {
            
                $mangaInCar = $dbh->getMangaInCart($_SESSION["email"]);
                foreach ($mangaInCar as $manga) {
                    $dbh->updateMangaQuantityAndCart($manga["idManga"], $manga["Quantità_In_Carrello"]);
                }
                
                $totalPrice = $dbh->getTotalPrice($_SESSION["email"]);
                
                $dbh->createOrder($_SESSION["email"], $mangaInCar, $totalPrice);

                echo "<p>Ordine completato con successo! Grazie per il tuo acquisto.</p>";
            } else {

                throw new Exception("Dati del modulo mancanti o incompleti.");
            }
        }
    } catch (Exception $e) {
        echo "<p>Errore durante l'elaborazione dell'ordine: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    ?>
</section>