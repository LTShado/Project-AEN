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
          <div class="gender">
            <div>
              <input type="radio" name="gender" value="mme">
              <label>Mme</label>
            </div>
            <div>
              <input type="radio" name="gender" value="mr">
              <label>Mr</label>
            </div>
          </div>
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
        <div>
          <label>Pilote</label>
          <input type="checkbox" onclick="add_row_avion()" name="check" id="check" value="1">
        </div>
        <div class="input">
          <div class="">
            <h2>Le nom de votre avion:</h2>
            <input type="text" name="nom_avion" id="nom_avion">
          </div>
          <div class="">
            <h2>La marque de votre avion:</h2>
            <input type="text" name="marque_avion" id="marque_avion">
          </div>
          <div class="">
            <h2>Le type de l'avion:</h2>
            <select name="type_avion" id="type_avion">
                <option value="">--Choisissez un type--</option>
                <option value="Mono-turbine Bi-turbine">Mono-turbine Bi-turbine</option>
                <option value="Réacteur mono/multi">Réacteur mono/multi</option>
            </select>
          </div>
          <div class="">
            <h2>La masse de votre avion rempli au maximum(en kg):</h2>
            <input type="number" name="masse" id="masse">
          </div>
        <div class="">
          <h2>La longueur de votre avion(en mètre):</h2>
          <input type="number" name="longueur" id="longueur">
        </div>
        <div class="">
          <h2>L'envergurede votre avion(en mètre):</h2>
          <input type="number" name="envergure" id="envergure">
        </div>
        <div class="">
          <h2>Le groupe acoustique de votre avion:</h2>
          <select name="grp_acoustique" id="grp_acoustique">
              <option value="">--Choisissez un groupe--</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5a">5a</option>
              <option value="5b">5b</option>
          </select>
        </div>
      </div>
        <div class="button_submit">
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
