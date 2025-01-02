<!DOCTYPE html>
<html lang="it" data-bs-theme="white">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $templateParams["titolo"]; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <header>
    <img src="../img/Logo.png" alt="Logo" />
  </header>
  <nav>
    <ul>
      <li><a href="index.php">Menu</a></li>
      <li><a href="#">Manga</a></li>
      <li><a href="profilo.php">Profilo</a></li>
      <li><a href="#">Carrello</a></li>
      <li>
        <button id="btnSwitch">🌙 Dark Mode</button>
      </li>
    </ul>
  </nav>
  <main>
  <?php
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
  ?>
  </main>
  <footer>
    <p>
      Manga Paradise Via dell'Università, 50, Cesena<img src="../img/Logo.png" alt="Logo" />
    </p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="index.js" type="text/javascript"></script>
</body>

</html>