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
                <img src="images/aeroclub_head2.jpg">
             </div>
             <div class="texte_head">
                <center><h1>Aéroclub</h1></center>
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
          $connected = isset($_SESSION['email']) ? true : false;
         $bdd =  connectionDB();
         $q = "SELECT * FROM services where loisir = ?";

        $req = $bdd -> prepare($q);
        $req -> execute(array(1));

        while($answers = $req->fetch()) {
            echo '<div class="titre_loisir">';
            echo '<h1>'.$answers['nom'].'</h>';
            echo '</div>';
            echo '<div class="img_loisir">';
            echo '<img src="'.$answers['img_emplacement'].'">';
            echo '</div>';
            echo '<div class="description_loisir">';
            echo '<p>'.$answers['c_description'].'</p>';
            if($answers['service'] == "rien"){
              echo '<a href="default.php">Cliquez ici</a>';
            }else if(!$connected){
              echo '<a href="'.$answers['url_page'].'">Information '.$answers['nom'].'</a>';
            }else{
              echo '<a href="reservation.php?service='.$answers['service'].'">Reservez</a>';
            }
            echo '</div>';
        }
        ?>
      </div>
      <div class="connexion_service">
        <?php if(!$connected){ ?>
          <a href="lecon_initiation.php">Information initiation</a>
        <?php } else{if($_SESSION['statut_pilote'] == 1 || $_SESSION['statut_initiation'] == 1){ ?>
            <a href="reservation.php">Vos cours</a>
        <?php }if($_SESSION['statut_pilote'] == 0 && $_SESSION['statut_initiation'] == 0){?>
          <a href="lecon_initiation.php">Information initiation</a>
        <?php }}?>
        <a href="lecon_initiation.php">Information initiation</a>
      </div>

    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
