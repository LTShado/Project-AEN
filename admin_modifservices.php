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
  <script src="AJAX/admin_services.js"></script>
  <main>
    <div class="titre">
        <h1>Page Admistration Des Utilisateurs</h1>
    </div>
    <div class="liens_administration">
      <?php
      require_once('includes/connexiondb.php');
       $bdd =  connectionDB();
       $q = "SELECT * FROM services WHERE id = ?";

       $req = $bdd -> prepare($q);
       $req -> execute(array($_GET['id']));

       $answers = $req->fetch();
       ?>
       <div class="infos_compte">
          <input type="text" class="hide" value="<?=$answers['id']?>" id="id">
           <h3>Nom :</h3>
           <div class="text_infos">
             <p id="txt_nom"><?= $answers['nom']?></p>
           </div>
           <input type="text" name="nom" class="input" id="nom" value="<?= $answers['nom']?>">

           <h3>Prix :</h3>
           <div class="text_infos">
             <p id="txt_prix"><?= $answers['prix']?></p>
           </div>
           <input type="number" name="prix" class="input" id="prix" value="<?= $answers['prix']?>">

           <h3>Courtes description : </h3>
           <div class="text_infos">
             <p id="txt_c_description"><?= $answers['c_description']?></p>
           </div>
           <input type="text" name="c_description" class="input" id="c_description" value="<?= $answers['c_description']?>">

           <h3>Longues description : </h3>
           <div class="text_infos">
             <p id="txt_l_description"><?= $answers['l_description']?></p>
           </div>
           <input type="text" name="l_description" class="input" id="l_description" value="<?= $answers['l_description']?>">

           <h3>Surface :</h3>
           <div class="text_infos">
             <p id="txt_surface"><?= $answers['surface']?></p>
           </div>
           <input type="number" name="surface" class="input" id="surface" value="<?= $answers['surface']?>">m2

           <h3>Image emplacement :</h3>
           <div class="text_infos">
             <p id="txt_img_emplacement"><?= $answers['img_emplacement']?></p>
           </div>
          <input type="text" name="img_emplacement" class="input" id="img_emplacement" value="<?= $answers['img_emplacement']?>">

           <h3>Durée : </h3>
           <div class="text_infos">
             <p id="txt_duree"><?= $answers['durée']?></p>
           </div>
           <input type="number" name="duree" class="input" id="duree" value="<?= $answers['durée']?>">

           <h3>Statut loisir : </h3>
           <div class="text_infos">
             <p id="txt_loisir"><?= $answers['loisir']?></p>
           </div>
           <input type="text" name="loisir" class="input" id="loisir" value="<?= $answers['loisir']?>">

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
