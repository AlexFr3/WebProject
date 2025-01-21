<section>
    <h2>Inserisci i dati della carta</h2>
    <form action="#" method="post">
    <ul>
        <!-- Nome sulla carta -->
        <li>
        <label for="card-name">Nome sulla carta</label>
        <input type="text" id="card-name" name="cardName" placeholder="Mario Rossi" required>
        </li>

        <!-- Numero della carta -->
        <li>
        <label for="card-number">Numero della carta</label>
        <input type="text" id="card-number" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required pattern="\d{4} \d{4} \d{4} \d{4}">
        </li>

        <!-- Data di scadenza -->
        <li>
        <label for="expiry-date">Data di scadenza</label>
        <input type="month" id="expiry-date" name="expiryDate" required>
        </li>

        <!-- CVV -->
        <li>
        <label for="cvv">CVV</label>
        <input type="password" id="cvv" name="cvv" placeholder="123" maxlength="3" required pattern="\d{3}">
        </li>

        <!-- Pulsante per inviare -->
        <li>
        <input class="button" type="submit" name="submit" value="Paga" />
        </li>
    </ul>
    </form>

    <?php 
        require_once 'bootstrap.php';
        if(isset($_POST["cardName"]) && isset($_POST["cardNumber"]) && isset($_POST["expireDate"]) && isset($_POST["cvv"])) {
            $mangaInCar = $dbh -> getMangaInCart($_SESSION["email"]);
            foreach($mangaInCar  as $manga){
                $dbh -> updateMangaQuantityAndCart($manga["idManga"], $manga["Quantità In Carrello"]);
            }
            $totalPrice = $dbh -> getTotalPrice($_SESSION["email"]);
            $dbh -> createOrder($_SESSION["email"],$mangaInCar,$totalPrice);
        }
    ?>
</section>