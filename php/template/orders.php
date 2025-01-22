<h1>Ordini</h1>
<?php if (empty($templateParams["orders"])): ?>
    <p class="no-orders">Non hai effettuato alcun ordine.</p>
<?php else: ?>
    <?php foreach ($templateParams["orders"] as $ordine): ?>
        <article class="order">
            <section class="order-data">
                <h3>Numero ordine #<?php echo $ordine['idOrdine']; ?></h3>
                <p><strong>Data Ordine:</strong> <?php echo $ordine['Data_ordine']; ?></p>
                <p><strong>Stato:</strong> <?php echo $ordine['Stato']; ?></p>
                <p><strong>Totale:</strong> €<?php echo $ordine['Totale']; ?></p>
                <input type="button" class="button" value="Visualizza dettagli ordine"/>

            </section>
            <section class="order-img-icon">
                <?php 
                switch ($ordine['Stato']) {
                    case 'In elaborazione':
                        $imgPath = '../img/parcel.svg';
                        break;
                    case 'Spedito':
                        $imgPath = 'path/to/truck.svg';
                        break;
                    case 'Consegnato':
                        $imgPath = 'path/to/check.svg';
                        break;
                    default:
                        $imgPath = 'path/to/loading.png'; 
                        break;
                }
                ?>
                <img src="<?php echo $imgPath; ?>" alt="<?php echo $ordine['Stato']; ?>" />
            </section>
        </article>
    <?php endforeach; ?>
<?php endif; ?>