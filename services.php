<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Services </title>
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
        <div class="connexion_service">
          <?php   $connected = isset($_SESSION['email']) ? true : false;
          if(!$connected){ ?>
            <a href="connexion.php">Se connecter</a>
          <?php } else{?>
            <p>Vous n'êtes pas inscrit en tant que pilote</p>
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
