<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Leçon de pilotage initiation </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <main>
    <div class="services">
        <div class="img_back">
            <!--<img id="img_back" src="images/background.png">-->
        </div>
        <div class="intro">
          <section>
            <div class="intro_head">
               <div>
                  <img src="images/services_head.png">
               </div>
               <div class="texte_head">
                  <center><h1>Leçon d'initiation</h1></center>
                </div>
            </div>
            <p>
              Reserver une journée dans laquelle vous étudirez pour la première fois l'aviation et
              vous finirez la journée par la prise en main d'un avion supperviser par l'un de nos
              instructeurs, et si cela vous plait vous
               pouvez decidez de poursuivre votre formations pour devenir un pilote émérite
            </p>
            <p>Journée d'un total de 150€</p>
          </section>
        </div>
        <div class="connexion_service">
          <?php   $connected = isset($_SESSION['email']) ? true : false;
          if(!$connected){ ?>
            <a href="connexion.php">Se connecter</a>
          <?php } else{?>
            <a href="reservation.php?lecon_pilotage">Commencer Maintenant</a>
          <?php }?>
        </div>

        </div>
    </div>
    </main>
    <?php
        include("footer.php");
    ?>
    </body>
</html>
