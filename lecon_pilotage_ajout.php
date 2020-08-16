<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Leçon pilotage reserver </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <script src="AJAX/lecon_pilotage_ajout.js"></script>
  <main>
    <div class="">
      <h1>Reserver une leçon</h1>
      <div class="Nom">
        <h2>Nom</h2>
        <input type="text" name="nom" id="nom" class="form-control">
      </div>
      <div class="date">
        <h2>Date</h2>
        <input type="date" name="date" id="date" class="form-control">
      </div>
      <div class="debut">
        <h2>Heure début</h2>
        <input type="time" min="07:00" max="19:00" name="debut" id="debut" class="form-control" placeholder="HH:MM:SS">
      </div>
      <div class="fin">
        <h2>Heure fin</h2>
        <input type="time" min="07:00" max="19:00" name="fin" id="fin" class="form-control" placeholder="HH:MM:SS">
      </div>
      <div class="button_submit test">
        <input type="button" onclick="add()" name="ajout" value="Faire une réservation" id="submit">
      </div>
      <div class="error" id="error">
      </div>
    </div>
  </main>
<?php
    include("footer.php");
?>
</body>
