<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Accueil </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <main>
    <div class="profil_infos">
      <div class="mes_infos">
        <a href="infos_profil.php">Informations du compte</a>
      </div>
      <div class="meteo">
        <a href="meteo.php">meteo</a>
      </div>
      <a href="test.php">test pour envoyer mail</a>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
  </body>
</html>
