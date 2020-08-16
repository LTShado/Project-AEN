<!Doctype html>
<html>

  <head>
      <meta charset="utf-8">
      <title> Connexion </title>
      <link rel="stylesheet" href="CSS/CSS.css">
      <link rel="stylesheet" href="CSS/bootstrap.css">
  </head>


  <body>
    <?php
    	include("header.php");
    ?>
    <script src="AJAX/connexion.js"></script>
    <main>
      <div class="compte">
        <div class="old">
          <h1>Vous avez déjà un compte ?</h1>
          <div class="connexion">
            <h2>Adresse email*</h2>
            <input type="email" name="email" id="email">
            <h2>Mot de passe*</h2>
            <input type="password" name="mdp" id="mdp">
            <br>
            <a href="#" id="forgot">Mot de passe oublié ?</a>
            <br>
            <div class="button_submit">
              <input type="button" onclick="connect()" name="connexion" value="Se connecter" id="submit">
            </div>
          </div>
          <div class="error" id="error">
          </div>
        </div>
        <div class="new">
          <h1>Vous n'avez pas encore de compte ?</h1>
          <div class="creation_compte">
            <h2>Créer votre compte</h2>
            <p>Inscrivez-vous pour créer votre alerte vol,
              réserver votre place de parking, votre prochain vol,
               un hôtel... et découvrez notre programme de fidélité
               My Paris Aéroport !
            </p>
            <!--<input type="submit" name="connection" value="Créer mon compte">-->
            <div class="button_submit">
              <a href="inscription.php">Créer mon compte</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php
    	include("footer.php");
    ?>
  </body>
