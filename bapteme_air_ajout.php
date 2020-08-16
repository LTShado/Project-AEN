<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bapteme de l'air reserver </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <script src="AJAX/bapteme_air_ajout.js"></script>
  <main>
    <div class="">
      <h1>Reserver votre Bapteme accompagné</h1>
      <p></p>
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
            <option value="8-10">Créneau de 8h à 10h</option>
            <option value="10h30-12h30">Créneau de 10h30 à 12h30</option>
            <option value="14-16">Créneau de 14h à 16h</option>
            <option value="16h30-18h30">Créneau de 16h30 à 18h30</option>
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
