<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Aéroclub </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <main>
    <div>
      <div class="intro">
        <section>
          <div class="intro_head">
             <div>
                <img src="images/services_head.png">
             </div>
             <div class="texte_head">
               <center><h1>Nos services</h1></center>
             </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </section>
      </div>
      <div class="activite">
        <?php
        require_once('includes/connexiondb.php');

         $bdd =  connectionDB();
         $q = "SELECT * FROM services where loisir = ?";

        $req = $bdd -> prepare($q);
        $req -> execute(array(0));

        while($answers = $req->fetch()) {
            echo '<div class="titre_loisir">';
            echo '<h1>'.$answers['nom'].'</h>';
            echo '</div>';
            echo '<div class="img_loisir">';
            echo '<img src="'.$answers['img_emplacement'].'">';
            echo '</div>';
            echo '<div class="description_loisir">';
            echo '<p>'.$answers['c_description'].'</p>';
            echo '</div>';
        }
        ?>
      </div>
        <a href="reservation.php?service=service_pilote">Demander un service</a>
      <div class="link_tarif">
        <a href="tarifs.php">Nos tarifs</a>
      </div>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
