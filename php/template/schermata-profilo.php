<p>Bentornato, <?php echo ($_SESSION["nome"]); ?> <?php echo ($_SESSION["cognome"]); ?></p>

<p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION["nome"]); ?></p>
<p><strong>Cognome:</strong> <?php echo htmlspecialchars($_SESSION["cognome"]); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
<p><a class="profile-button" href="ordersIndex.php" id="order">I miei ordini</a></p>
<p><a class="profile-button" href="notificheIndex.php" id="notifiche">Notifiche</a></p>

<p><a class="red-button" href="logout.php" id="logout">Logout</a></p>