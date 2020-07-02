<?php session_start();
$connected = isset($_SESSION['email']) ? true : false;?>
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
  <script src="AJAX/infos.js"></script>
  <main>
    <div class="infos">
      <div class="infos_titre">
        <h1>Informations du compte</h1>
      </div>
      <div class="vos_infos">
        <h2>Vos informations personnelles</h2>
        <?php
        require_once('includes/connexiondb.php');

         $bdd =  connectionDB();
         $q = "SELECT * FROM client WHERE email = ?";

         $req = $bdd -> prepare($q);
         $req -> execute(array($_SESSION['email']));
         $answers = $req -> fetch();
         ?>
         <div class="infos_compte">
           <h3>Email :</h3>
           <div class="text_infos">
             <p id="txt_email"><?= $_SESSION['email']?></p>
           </div>
           <input type="email" name="email" class="input" id="email" value="<?= $answers['email']?>">

           <h3>Nom :</h3>
           <div class="text_infos">
             <p id="txt_nom"><?= $answers['nom']?></p>
           </div>
           <input type="text" name="nom" class="input" id="nom" value="<?= $answers['nom']?>">

           <h3>Prenom : </h3>
           <div class="text_infos">
             <p id="txt_prenom"><?= $answers['prenom']?></p>
           </div>
           <input type="text" name="prenom" class="input" id="prenom" value="<?= $answers['prenom']?>">

           <h3>Civ : <?= $answers['civ']?></h3>
           <div class="text_infos">
             <?= $answers['civ']?>
           </div>

           <h3>Date de naissance : <?= $answers['birth']?></h3>

           <h3>Code postal :</h3>
           <div class="text_infos">
             <p id="txt_postal"><?= $answers['postal']?></p>
           </div>
          <input type="number" name="postal" class="input" id="postal" value="<?= $answers['postal']?>">

           <h3>Numéro de portable : </h3>
           <input type="tel" name="tel" class="input" id="tel" value="<?= $answers['tel']?>">
           <div class="text_infos">
             <p id="txt_tel"><?= $answers['tel']?></p>
           </div>
           <button type="button" onclick="modify()" name="modifier" id="btn_modify">Modifier</button>
           <button type="button" onclick="enregistrer()" name="enregistrer" id="btn_enregistrer" >Enregister</button>
           <div class="error" id="error">
         </div>
      </div>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
  </body>
</html>
