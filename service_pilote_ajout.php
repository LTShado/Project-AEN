<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pilote demande </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <script src="AJAX/service_pilote_ajout.js"></script>
  <main>
    <div class="">
      <?php
      require_once('includes/connexiondb.php');

       $bdd =  connectionDB();
       $q = "SELECT id FROM client WHERE email=?";
       $req_id = $bdd->prepare($q);
       $req_id->execute(array($_SESSION['email']));
       $answers_id=$req_id->fetch();

       $q = "SELECT * FROM avion where id_client = ?";

      $req = $bdd -> prepare($q);
      $req -> execute(array($answers_id['id']));
      $answers=$req->fetch();
      ?>
      <input class="" value="<?= $answers['statut_site']?>" id="statut_site">
      <h1>Demander un service</h1>
      <p></p>
      <div class="test">
        <select name="service" id="service" onchange="add_row_service_pilote(value)">
            <option value="">--Choisissez un service--</option>
            <option value="stationnement ">Stationnement </option>
            <option value="avitaillement ">Avitaillement </option>
            <option value="nettoyage_int">Nettoyage intérieur </option>
        </select>
      </div>
      <p id="demo"></p>
      <p id="demo2"></p>
      <div class="input_stationnement">
        <div class="emplacement">
          <h2>Choississez où sera ranger votre avion</h2>
          <div class="choix_emplacement">
            <div>
              <input type="radio" name="emplacement" value="int">
              <label>Intérieur</label>
            </div>
            <div>
              <input type="radio" name="emplacement" value="ext" checked>
              <label>Extérieur</label>
            </div>
          </div>
        </div>

        <div class="Nom">
          <h2>Nom</h2>
          <p>(ce nom a pour but de vous aidez à vous reperer dans vos reservations)</p>
          <input type="text" name="nom" id="nom_stationnement" class="form-control">
        </div>
        <?php
        if($answers['statut_site']==0){
        ?>
        <div class="date">
          <h2>Date d'arrivée</h2>
          <input type="date" name="date" id="date_stationnement" class="form-control">
        </div>
        <div class="debut">
          <h2>Heure d'arrivée estimé minimum</h2>
          <input type="time" min="07:00" max="19:00" name="debut" id="debut_stationnement" class="form-control" placeholder="HH:MM:SS">
        </div>
        <div class="fin">
          <h2>Heure d'arrivée estimé maximum</h2>
          <input type="time" min="07:00" max="19:00" name="fin" id="fin_stationnement" class="form-control" placeholder="HH:MM:SS">
        </div>
      <?php }else{?>
        <p>Vous n'êtes pas soumis au prix de l'atterissage vu que votre avion est dans la base</p>
      <?php }?>
      </div>

      <div class="input_avitaillement">
        <div class="Nom">
          <h2>Nom</h2>
          <p>(ce nom a pour but de vous aidez à vous reperer dans vos reservations)</p>
          <input type="text" name="nom" id="nom_avitaillement" class="form-control">
        </div>
        <?php
        if($answers['statut_site']==0){
        ?>
        <div class="date">
          <h2>Date d'arrivée</h2>
          <input type="date" name="date" id="date_avitaillement" class="form-control">
        </div>
        <div class="debut">
          <h2>Heure d'arrivée estimé minimum</h2>
          <input type="time" min="07:00" max="19:00" name="debut" id="debut_avitaillement" class="form-control" placeholder="HH:MM:SS">
        </div>
        <div class="fin">
          <h2>Heure d'arrivée estimé maximum</h2>
          <input type="time" min="07:00" max="19:00" name="fin" id="fin_avitaillement" class="form-control" placeholder="HH:MM:SS">
        </div>
      <?php }else{?>
        <div class="date">
          <h2>Date de disponibilité</h2>
          <input type="date" name="date" id="date_avitaillement_dispo" class="form-control">
        </div>
        <div class="debut">
          <h2>Heure de disponibilité minimum</h2>
          <input type="time" min="07:00" max="19:00" name="debut" id="debut_avitaillement_dispo" class="form-control" placeholder="HH:MM:SS">
        </div>
        <div class="fin">
          <h2>Heure de disponibilité maximum</h2>
          <input type="time" min="07:00" max="19:00" name="fin" id="fin_avitaillement_dispo" class="form-control" placeholder="HH:MM:SS">
        </div>
      <?php }?>
      </div>

      <div class="input_nettoyage">
        <?php
        if($answers['statut_site']==1){
        ?>
        <div class="Nom">
          <h2>Nom</h2>
          <p>(ce nom a pour but de vous aidez à vous reperer dans vos reservations)</p>
          <input type="text" name="nom" id="nom_nettoyage" class="form-control">
        </div>
        <div class="date">
          <h2>Date d'arrivée</h2>
          <input type="date" name="date" id="date_nettoyage" class="form-control">
        </div>
        <div class="debut">
          <h2>Heure de disponibilité minimum</h2>
          <input type="time" min="07:00" max="19:00" name="debut" id="debut_nettoyage" class="form-control" placeholder="HH:MM:SS">
        </div>
        <div class="fin">
          <h2>Heure de disponibilité maximum</h2>
          <input type="time" min="07:00" max="19:00" name="fin" id="fin_nettoyage" class="form-control" placeholder="HH:MM:SS">
        </div>
      <?php }else{?>
        <p>Vous devez commencez par stationner sur la base donc veuillez au près alable reserver un emplacement ext ou int</p>
      <?php }?>
      </div>

      <div class="button_submit test">
        <input type="button" onclick="add()" name="ajout" value="Demander un service" id="submit">
      </div>
      <div class="error" id="error">
      </div>
    </div>
  </main>
<?php
    include("footer.php");
?>
</body>
