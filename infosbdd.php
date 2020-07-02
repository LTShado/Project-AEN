<?php
  session_start();
  require_once('includes/connexiondb.php');
  $bdd =  connectionDB();
  $q = "SELECT * FROM client WHERE email = ?";

  $req = $bdd -> prepare($q);
  $req -> execute(array($_SESSION['email']));
  $answers = $req -> fetch();
?>
