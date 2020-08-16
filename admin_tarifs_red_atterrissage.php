<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin Redevance Atterissage </title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <script src="AJAX/admin_tarifs_red_atterrissage.js"></script>
  <main>
    <div class="atitre">
        <h1>Page Admistration De La Redevance Atterissage</h1>
    </div>
    <div class="liens_administration">
        <h2>Redevance d'atterissage</h2>
        <table>
          <tr>
            <th>Types avions</th>
            <th>&nbsp;</th>
            <th>Hors Taxes</th>
            <th>TVA</th>
            <th>TTC</th>
            <th>&nbsp;</th>
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

          $i = 0;

          while($answers = $req->fetch()) {
            $i++;
              echo '<tr>';
                echo '<td><p class="'.$i.'" id="'.$i.'_txt_horaires">'.$answers['horaires'].'</p>
                <input type="text" name="horaires" class="'.$i.'_input , hide" id="'.$i.'_horaires" value="'.$answers['horaires'].'"></td>';

                echo '<td><p  class="'.$i.'" id="'.$i.'_txt_HT">'.$answers['Hors_Taxes'].'€</p>
                <input type="text" name="HT" class="'.$i.'_input , hide" id="'.$i.'_HT" value="'.$answers['Hors_Taxes'].'"></td>';

                echo '<td><p class="'.$i.'" id="'.$i.'_txt_TVA">'.$answers['TVA'].'€</p>
                <input type="text" name="TVA" class="'.$i.'_input , hide" id="'.$i.'_TVA" value="'.$answers['TVA'].'"></td>';

                echo '<td><p  class="'.$i.'" id="'.$i.'_txt_TTC">'.$answers['TTC'].'€</p>
                <input type="text" name="TTC" class="'.$i.'_input , hide" id="'.$i.'_TTC" value="'.$answers['TTC'].'"></td>';


                echo '<td><button type="button" onclick="modify('.$i.')" name="modifier" id="'.$i.'_btn_modify">Modifier</button>
                <button type="button" onclick="enregistrer('.$answers['id'].' , '.$i.')" name="enregistrer" id="'.$i.'_btn_enregistrer" class="hide" >Enregister</button></td>';
              echo '</tr>';
          }

          $q = "SELECT * FROM redevance_atterissage where nb_types=?";

         $req = $bdd -> prepare($q);
         $req2 = $bdd -> prepare($q);
         $req -> execute(array(2));
         $req2 -> execute(array(2));

         $types_avions = $req2->fetch();
         echo '<td rowspan=5>'.$types_avions['types_avions'].'</td>';

         $j = "_bis";
         $k = 0;

         while($answers = $req->fetch()) {
           $j = "_bis";
           $k++;
           $j = $k.$j;
             echo '<tr>';
               echo '<td><p class="'.$j.'" id="'.$j.'_txt_horaires">'.$answers['horaires'].'</p>
               <input type="text" name="horaires" class="'.$j.'_input , hide" id="'.$j.'_horaires" value="'.$answers['horaires'].'"></td>';

               echo '<td><p  class="'.$j.'" id="'.$j.'_txt_HT">'.$answers['Hors_Taxes'].'€</p>
               <input type="text" name="HT" class="'.$j.'_input , hide" id="'.$j.'_HT" value="'.$answers['Hors_Taxes'].'"></td>';

               echo '<td><p class="'.$j.'" id="'.$j.'_txt_TVA">'.$answers['TVA'].'€</p>
               <input type="text" name="TVA" class="'.$j.'_input , hide" id="'.$j.'_TVA" value="'.$answers['TVA'].'"></td>';

               echo '<td><p  class="'.$j.'" id="'.$j.'_txt_TTC">'.$answers['TTC'].'€</p>
               <input type="text" name="TTC" class="'.$j.'_input , hide" id="'.$j.'_TTC" value="'.$answers['TTC'].'"></td>';

               echo '<td><button type="button" onclick="modify(\''.$j.'\')" name="modifier" id="'.$j.'_btn_modify">Modifier</button>
               <button type="button" onclick="enregistrer('.$answers['id'].' , \''.$j.'\')" name="enregistrer" id="'.$j.'_btn_enregistrer" class="hide" >Enregister</button></td>';
             echo '</tr>';
         }

          ?>

        </table>
        <div class="error" id="error"></div>
    </div>
  </main>
  <?php
      include("footer.php");
  ?>
</body>
