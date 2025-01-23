<h1>I miei ordini</h1>
<?php if (empty($templateParams["orders"])): ?>
    <p>Non hai effettuato alcun ordine.</p>
<?php else: ?>
    <?php foreach ($templateParams["orders"] as $ordine): ?>
        <article class="order">
            <section class="order-data">
                <h2>Numero ordine #<?php echo $ordine['idOrdine']; ?></h2>
                <p><strong>Data Ordine:</strong> <?php echo $ordine['Data_ordine']; ?></p>
                <p><strong>Stato:</strong> <?php echo $ordine['Stato']; ?></p>
                <p><strong>Totale:</strong> €<?php echo $ordine['Totale']; ?></p>
                <a href="orderIndex.php?idOrdine=<?php echo $ordine['idOrdine']; ?>" class="button">Dettagli ordine</a>
            </section>
            <section class="order-img-icon">
                <?php
                switch ($ordine['Stato']) {
                    case 'In elaborazione':
                        $imgPath = '../img/parcel.svg';
                        break;
                    case 'Spedito':
                        $imgPath = '../img/truck.svg';
                        break;
                    case 'Consegnato':
                        $imgPath = '../img/check.svg';
                        break;
                    default:
                        $imgPath = '../img/loading.png';
                        break;
                }
                ?>
                <img src="<?php echo $imgPath; ?>" alt="<?php echo $ordine['Stato']; ?>" />
            </section>
        </article>
    <?php endforeach; ?>
<?php endif; ?>