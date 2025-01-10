        <form action="registrazione.php" method="POST">
        <h1>Registrazione</h1>
        <?php if(isset($templateParams["erroreregistrazione"])): ?>
            <div class="alert alert-danger" role="alert"><p><?php echo $templateParams["erroreregistrazione"]; ?></p></div>
        <?php endif; ?>
        <ul>
            <li>
                <label for="nome">Nome:</label><input type="text" id="nome" name="nome" />
            </li>
            <li>
                <label for="cognome">Cognome:</label><input type="text" id="cognome" name="cognome" />
            </li>
            <li>
                <label for="email">Email:</label><input type="text" id="email" name="email" />
            </li>
            <li>
                <label for="password">Password:</label><input type="password" id="password" name="password" />
            </li>
            <li>
                <label for="conf-password">Conferma Password:</label><input type="password" id="conf-password" name="conf-password" />
            </li>
            <li>
                <input type="submit" name="submit" value="Registrati" />
            </li>
        </ul>
        </form>