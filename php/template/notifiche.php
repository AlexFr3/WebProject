<section>

    <?php if (isset($templateParams["notifichaLetta"])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($templateParams["notifichaLetta"]); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($templateParams["notificaVuota"])): ?>
            <div class="alert alert-info" role="alert">
                <?php echo htmlspecialchars($templateParams["notificaVuota"]); ?>
            </div>
        <?php endif; ?>

    <h1>Notifiche</h1>
    <form action="notificheIndex.php" method="post">
        <?php 
            if (!empty($templateParams["notifiche"])) {
                foreach ($templateParams["notifiche"] as $notifica) {
                    $notificaId = htmlspecialchars($notifica['idNotifica']);
                    ?>
                    <article>
                        <input type="checkbox" name="notifiche[]" value="<?php echo $notificaId; ?>" id="notifica-<?php echo $notificaId; ?>">
                        <label for="notifica-<?php echo $notificaId; ?>">
                            <?php echo htmlspecialchars($notifica['Testo']); ?>
                        </label>
                        <?php if ($notifica['Letta']) { ?>
                            <span>(Letta)</span>
                        <?php } ?>
                    </article>
                    <?php
                }
                ?>
                <button type="submit" name="markRead" class="profile-button">Segna come lette</button>
                <?php
            } else {
                echo "<p>Non ci sono notifiche disponibili.</p>";
            }
        ?>
    </form>
</section>