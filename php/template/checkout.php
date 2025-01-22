
<form action="checkoutIndex.php" method="post">
<h1>Inserisci i dati della carta</h1>
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
