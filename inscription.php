<!Doctype html>
<html>

  <head>
      <meta charset="utf-8">
      <title> Inscription </title>
      <link rel="stylesheet" href="CSS/CSS.css">
      <link rel="stylesheet" href="CSS/bootstrap.css">
  </head>


  <body>
    <?php
    	include("header.php");
    ?>
    <script src="AJAX/inscription.js"></script>
    <main>
      <div class="inscrire">
        <div class="civ">
          <h2>Civilité</h2>
        </div>
        <div class="nom">
          <h2>Votre nom</h2>
          <input type="text" name="nom" id="nom">
        </div>
        <div class="prenom">
          <h2>Votre prénom</h2>
          <input type="text" name="prenom" id="prenom">
        </div>
        <div class="email">
          <h2>Votre e-mail</h2>
          <input type="email" name="email" id="email">
        </div>
        <div class="mdp">
          <h2>Mot de passe</h2>
          <input type="password" name="mdp1" id="mdp1">
          <h2>Confirmez le mot de passe</h2>
          <input type="password" name="mdp2" id="mdp2">
        </div>
        <div class="postal">
          <h2>Votre adresse postal</h2>
          <input type="number" name="postal" id="postal">
        </div>
        <div class="date_naissance">
          <h2>Votre date de naissance</h2>
          <input type="date" name="birth" id="birth">
        </div>
        <div class="telephone">
          <h2>Votre numéro de portable</h2>
          <input type="tel" name="tel" maxlength="10" id="tel">
        </div>
        <div class="submit">
          <input type="button" onclick="add()" name="inscription" value="Créer mon compte" id="submit">
        </div>
        <div class="error" id="error">
        </div>
      </div>
    </main>
    <?php
    	include("footer.php");
    ?>
  </body>
