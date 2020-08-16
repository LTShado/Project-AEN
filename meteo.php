<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Meteo </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <script src="AJAX/meteo.js"></script>
  <main>
    <div class="atitre">
        <h1>Meteo</h1>
    </div>
    <div class="meteo">
      <input type="text" name="ville" id="ville">
      <button type="button" onclick="search()" name="search" id="btn_search">Chercher</button>
      <div class="infos_meteo" id="infos_meteo">
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
