<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin User </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <main>
    <div class="atitre">
        <h1>Page Admistration Des Utilisateurs</h1>
    </div>
    <div class="liens_administration">
      <input type="text" name="search" value="" placeholder="Chercher">
      <?php
      require_once('includes/connexiondb.php');

       $bdd =  connectionDB();
       $q = "SELECT * FROM client";

       $req = $bdd -> prepare($q);
       $req -> execute();

       while($answers = $req->fetch()) {
           echo '<p>'.$answers['nom'].'</p>';
           echo '<p>'.$answers['prenom'].'</p>';
           echo '<a href="admin_modifuser.php?id='.$answers['id'].'">Afficher</a>';
       }
       ?>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
