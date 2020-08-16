<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin Tarifs </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <main>
    <div class="atitre">
        <h1>Page Admistration Des Tarifs</h1>
    </div>
    <div class="liens_administration">
      <input type="text" name="search" value="" placeholder="Chercher">
      <a href="admin_tarifs_red_atterrissage.php">Tableau redevance atterissage</a>
      <a href="admin_grp_acoustique.php">Tableau groupe acoustique</a>
      <a href="admin_tarifs_red_balisage.php">Tableau redevance balisage</a>
      <a href="admin_tarifs_red_ext.php">Tableau redevance stationnement extérieur</a>
      <a href="admin_tarifs_petrole.php">Tableau petrole</a>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
