        <form action="#" method="POST">
        <h1>Login</h1>
        <?php if(isset($templateParams["messaggiologin"])): ?>
        <p><?php echo $templateParams["messaggiologin"]; ?></p>
        <?php endif; ?>
        <ul>
            <li>
                <label for="email">Email:</label><input type="text" id="email" name="email" />
            </li>
            <li>
                <label for="password">Password:</label><input type="password" id="password" name="password" />
            </li>
            <li>
                <input type="submit" name="submit" value="Invia" />
            </li>
        </ul>
        <p>Non hai un account? <a href="registrazione.php">Registrati</a></p>
        </form>