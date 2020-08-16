<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Tarif </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <main>
    <div>
      <div class="intro">
        <section>
          <div class="intro_head">
             <div>
                <img src="images/services_head.png">
             </div>
             <div class="texte_head">
               <center><h1>Nos services</h1></center>
             </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </section>
      </div>
      <div class="tab_redevance">
        <h2>Redevance d'atterissage</h2>
        <table>
          <tr>
            <th>Types avions</th>
            <th>&nbsp;</th>
            <th>Hors Taxes</th>
            <th>TVA</th>
            <th>TTC</th>
          </tr>
          <?php
          require_once('includes/connexiondb.php');

           $bdd =  connectionDB();
           $q = "SELECT * FROM redevance_atterissage where nb_types=?";

           $req = $bdd -> prepare($q);
           $req2 = $bdd -> prepare($q);
           $req -> execute(array(1));
           $req2 -> execute(array(1));

          $types_avions = $req2->fetch();
          echo '<td rowspan=5>'.$types_avions['types_avions'].'</td>';

          while($answers = $req->fetch()) {
              echo '<tr>';
                echo '<td>'.$answers['horaires'].'</td>';
                echo '<td>'.$answers['Hors_Taxes'].'€</td>';
                echo '<td>'.$answers['TVA'].'€</td>';
                echo '<td>'.$answers['TTC'].'€</td>';
              echo '</tr>';
          }

          $q = "SELECT * FROM redevance_atterissage where nb_types=?";

         $req = $bdd -> prepare($q);
         $req2 = $bdd -> prepare($q);
         $req -> execute(array(2));
         $req2 -> execute(array(2));

         $types_avions = $req2->fetch();
         echo '<td rowspan=5>'.$types_avions['types_avions'].'</td>';

         while($answers = $req->fetch()) {
             echo '<tr>';
               echo '<td>'.$answers['horaires'].'</td>';
               echo '<td>'.$answers['Hors_Taxes'].'€</td>';
               echo '<td>'.$answers['TVA'].'€</td>';
               echo '<td>'.$answers['TTC'].'€</td>';
             echo '</tr>';
         }

          ?>

        </table>
        <p>Le tarif est multiplié par un coefficient dépendant du groupe acoustique de l'aéronef et de l'heure de l'atterrissage.</p>
        <table>
          <tr>
            <th>Groupe acoustique</th>
            <th>Jour et soir (6h00 - 22h00)</th>
            <th>Nuit (22h00 - 6h00)</th>
          </tr>
          <?php
           $bdd =  connectionDB();
           $q = "SELECT * FROM grp_acoustique";

          $req = $bdd -> prepare($q);
          $req -> execute();

          while($answers = $req->fetch()) {
              echo '<tr>';
                echo '<td>'.$answers['grp_acoustique'].'</td>';
                echo '<td>'.$answers['coeff_jour'].'</td>';
                echo '<td>'.$answers['coeff_nuit'].'</td>';
              echo '</tr>';
          }
          ?>
        </table>
      </div>
      <h3>Exemples:</h3>
    </div>

    <div class="redevance_helico">
      <h2>Redevance d'atterrissage pour hélicoptères ou ULM non basés </h2>
      <p>La redevance d'atterrissage est minorée de 50% (deux premières lignes du tableau précédent pour les ULM) </p>
    </div>

    <div class="frais_dossier">
      <h2>Frais de dossiers </h2>
      <p>Le total de la facture impayée le jour du mouvement est majoré de 31 € (25,83 € HTVA) pour frais de recherches et de dossier.</p>
    </div>

    <div class="tab_redevance_balisage">
      <h2>Redevance balisage (par unité de 30 minutes)</h2>
      <table>
        <tr>
          <th>Hors Taxes</th>
          <th>TVA</th>
          <th>TTC</th>
        </tr>
        <?php
         $bdd =  connectionDB();
         $q = "SELECT * FROM redevance_balisage";

        $req = $bdd -> prepare($q);
        $req -> execute();

        while($answers = $req->fetch()) {
            echo '<tr>';
              echo '<td>'.$answers['Hors_Taxes'].'€</td>';
              echo '<td>'.$answers['TVA'].'€</td>';
              echo '<td>'.$answers['TTC'].'€</td>';
            echo '</tr>';
        }
        ?>
      </table>
    </div>

    <div class="tab_redevance_stationnement_ext">
      <h2>Redevance pour stationnement extérieur</h2>
      <p>(par m² de surface au sol et par semaine indivisible - franchise de 2 semaines) </p>
      <table>
        <tr>
          <th>Hors Taxes</th>
          <th>TVA</th>
          <th>TTC</th>
        </tr>
        <?php
         $bdd =  connectionDB();
         $q = "SELECT * FROM redevance_stationnement_ext";

        $req = $bdd -> prepare($q);
        $req -> execute();

        while($answers = $req->fetch()) {
            echo '<tr>';
              echo '<td>'.$answers['Hors_Taxes'].'</td>';
              echo '<td>'.$answers['TVA'].'</td>';
              echo '<td>'.$answers['TTC'].'</td>';
            echo '</tr>';
        }
        ?>
      </table>
    </div>

    <div class="tab_redevance_abris">
      <h2>Redevance d'abris</h2>
      <p>avec S = longueur * envergure, et M = masse maximum au décollage</p>
      <table>
        <tr>
          <th>&nbsp;</th>
          <th>S < 60m²</th>
          <th>60m² ≤ S < 100m²</th>
          <th>100m² < S</th>
        </tr>
        <tr>
          <td>M < 0.5t</td>
          <td bgcolor="black"></td>
          <td bgcolor="black"></td>
          <td></td>
        </tr>
        <tr>
          <td>0.5 ≤ M < 1t</td>
          <td bgcolor="black"></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>1t < M</td>
          <td></td>
          <td></td>
          <td bgcolor="grey"></td>
        </tr>
      </table>

      <h2>CATEGORIES</h2>
      <table>
        <tr>
          <th>&nbsp;</th>
          <th colspan="2">Tarif mensuel aéronefs basés </th>
          <th colspan="2">Tarif journalier aéronefs basés </th>
          <th colspan="2">Tarif journalier aéronefs non-basés</th>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>HT</td>
          <td>TTC</td>
          <td>HT</td>
          <td>TTC</td>
          <td>HT</td>
          <td>TTC</td>
        </tr>
        <tr>
          <td  bgcolor="grey">Cat 1</td>
          <td>150.00€</td>
          <td>180.00€</td>
          <td>5.50€</td>
          <td>6.60€</td>
          <td>9.38€</td>
          <td>11.25€</td>
        </tr>
        <tr>
          <td bgcolor="black"><font color="white">Cat 2</font></td>
          <td>116.67€</td>
          <td>140.00€</td>
          <td>4.33€</td>
          <td>5.20€</td>
          <td>7.29€</td>
          <td>8.75€</td>
        </tr>
        <tr>
          <td>Cat 3</td>
          <td>70.63€</td>
          <td>85.00€</td>
          <td>2.63€</td>
          <td>3.15€</td>
          <td>4.42€</td>
          <td>5.30€</td>
        </tr>
      </table>
    </div>

    <div class="petrole">
      <h2>Produits pétroliers</h2>

      <table>
        <tr>
          <th>PRODUIT</th>
          <th>HT</th>
          <th>TVA 20%</th>
          <th>TTC</th>
        </tr>
        <?php
         $bdd =  connectionDB();
         $q = "SELECT * FROM petrole";

        $req = $bdd -> prepare($q);
        $req -> execute();

        while($answers = $req->fetch()) {
            echo '<tr>';
              echo '<td>'.$answers['produit'].'</td>';
              echo '<td>'.$answers['HT'].'€</td>';
              echo '<td>'.$answers['TVA_20p'].'€</td>';
              echo '<td>'.$answers['TTC'].'€</td>';
            echo '</tr>';
        }
        ?>
    </table>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
