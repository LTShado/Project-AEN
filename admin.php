<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <main>
    <div class="atitre">
        <h1>Page Admistration</h1>
    </div>
    <div class="liens_administration">
      <a href="admin_user.php">Utilisateurs</a>
      <a href="admin_services.php">Services</a>
      <a href="admin_tarifs.php">Tarifs</a>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
