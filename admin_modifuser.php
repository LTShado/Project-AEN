<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin User Modif </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <script src="AJAX/admin_infos.js"></script>
  <main>
    <div class="titre">
        <h1>Page Admistration Des Utilisateurs</h1>
    </div>
    <div class="liens_administration">
      <?php
      require_once('includes/connexiondb.php');
       $bdd =  connectionDB();
       $q = "SELECT * FROM client WHERE id = ?";

       $req = $bdd -> prepare($q);
       $req -> execute(array($_GET['id']));

       $answers = $req->fetch();
       ?>
       <div class="infos_compte">
          <input type="text" class="hide" value="<?=$answers['id']?>" id="id">
           <h3>Email :</h3>
           <div class="text_infos">
             <p id="txt_email"><?= $answers['email']?></p>
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

           <h3>Civ :</h3>
           <div class="text_infos">
             <p id="txt_civ"><?= $answers['civ']?></p>
           </div>

           <div class="gender_admin">
             <div>
               <input type="radio" name="gender" class="input" value="mme">
               <label class="input">Mme</label>
             </div>
             <div>
               <input type="radio" name="gender" class="input" value="mr">
               <label class="input">Mr</label>
             </div>
           </div>

           <h3>Date de naissance :</h3>
           <div class="text_infos">
             <p id="txt_birth"><?= $answers['birth']?></p>
           </div>
           <input type="date" name="birth" class="input" id="birth" value="<?= $answers['birth']?>">

           <h3>Code postal :</h3>
           <div class="text_infos">
             <p id="txt_postal"><?= $answers['postal']?></p>
           </div>
          <input type="number" name="postal" class="input" id="postal" value="<?= $answers['postal']?>">

           <h3>Numéro de portable : </h3>
           <div class="text_infos">
             <p id="txt_tel"><?= $answers['tel']?></p>
           </div>
           <input type="tel" name="tel" class="input" id="tel" value="<?= $answers['tel']?>">

           <h3>Statut Pilote : </h3>
           <div class="text_infos">
             <p id="txt_statut_pilote"><?= $answers['statut_pilote']?></p>
           </div>
           <input type="text" name="statut_pilote" class="input" id="statut_pilote" value="<?= $answers['statut_pilote']?>">

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
