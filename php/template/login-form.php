        <form action="login.php" method="POST">
        <h1>Login</h1>
        <?php if(isset($templateParams["errorelogin"])): ?>
        <div class="alert alert-danger" role="alert"><p><?php echo $templateParams["errorelogin"]; ?></p></div>
        <?php endif; ?>
        <?php if(isset($templateParams["messaggiologin"])): ?>
            <div class="alert alert-success" role="alert"><p><?php echo $templateParams["messaggiologin"]; ?></p></div>
        <?php endif; ?>
        <ul>
            <li>
                <label for="email">Email:</label><input type="text" id="email" name="email" />
            </li>
            <li>
                <label for="password">Password:</label><input type="password" id="password" name="password" />
            </li>
            <li>
                <input class="profile-button" type="submit" name="submit" value="Invia" />
            </li>
        </ul>
        <p>Non hai un account? <a href="registrazione.php">Registrati</a></p>
        </form>