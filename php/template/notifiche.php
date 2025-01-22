<section>
    <h1>Notifiche</h1>
    <article>
        <?php 
            if (!empty($templateParams["notifiche"])) {
                foreach ($templateParams["notifiche"] as $notifica) {
                    echo "<p>" . htmlspecialchars($notifica['Testo']) . "</p>";
                }
            } else {
                echo "<p>Non ci sono notifiche disponibili.</p>";
            }
        ?>
    </article>
</section>