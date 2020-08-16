<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Leçon pilotage initiation reserver </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <script src="AJAX/lecon_pilotage_initiation_ajout.js"></script>
  <main>
    <div class="">
      <h1>Reserver votre leçon d'initiation</h1>
      <p>Cette leçon dure toute la journée de 8h à 12h ou de 14h à 18h et cette journée ce finira par un vol de 30min</p>
      <div class="Nom">
        <h2>Nom</h2>
        <p>(ce nom a pour but de vous aidez à vous reperer dans vos reservations)</p>
        <input type="text" name="nom" id="nom" class="form-control">
      </div>
      <div class="date">
        <h2>Date</h2>
        <input type="date" name="date" id="date" class="form-control">
      </div>
      <div class="creneau">
        <h2>Choisir un créneau</h2>
        <select name="creneau" id="creneau">
            <option value="">--Choisissez un créneau--</option>
            <option value="8-12">Créneau de 8h à 12h</option>
            <option value="14-18">Créneau de 14h à 18h</option>
        </select>
      </div>
      <div class="button_submit test">
        <input type="button" onclick="add()" name="ajout" value="Reserver votre leçon d'initiation" id="submit">
      </div>
      <div class="error" id="error">
      </div>
    </div>
  </main>
<?php
    include("footer.php");
?>
</body>
