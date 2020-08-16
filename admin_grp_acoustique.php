<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin Groupe Acoustique</title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <script src="AJAX/admin_grp_acoustique.js"></script>
  <main>
    <div class="atitre">
        <h1>Page Admistration Du Groupe Acoustique</h1>
    </div>
    <div class="liens_administration">
      <h2>Groupe Acoustique</h2>
      <table>
        <tr>
          <th>Groupe acoustique</th>
          <th>Jour et soir (6h00 - 22h00)</th>
          <th>Nuit (22h00 - 6h00)</th>
        </tr>
        <?php
        require_once('includes/connexiondb.php');
        $bdd =  connectionDB();
        $q = "SELECT * FROM grp_acoustique";

        $req = $bdd -> prepare($q);
        $req -> execute();

        $i = 0;
        while($answers = $req->fetch()) {
          $i++;
            echo '<tr>';
              echo '<td><p class="'.$i.'" id="'.$i.'_txt_grp_acoustique">'.$answers['grp_acoustique'].'</p>
              <input type="text" name="grp_acoustique" class="'.$i.'_input , hide" id="'.$i.'_grp_acoustique" value="'.$answers['grp_acoustique'].'"></td>';

              echo '<td><p class="'.$i.'" id="'.$i.'_txt_coeff_jour">'.$answers['coeff_jour'].'</p>
              <input type="text" name="coeff_jour" class="'.$i.'_input , hide" id="'.$i.'_coeff_jour" value="'.$answers['coeff_jour'].'"></td>';

              echo '<td><p class="'.$i.'" id="'.$i.'_txt_coeff_nuit">'.$answers['coeff_nuit'].'</p>
              <input type="text" name="coeff_nuit" class="'.$i.'_input , hide" id="'.$i.'_coeff_nuit" value="'.$answers['coeff_nuit'].'"></td>';

              echo '<td><button type="button" onclick="modify('.$i.')" name="modifier" id="'.$i.'_btn_modify">Modifier</button>
              <button type="button" onclick="enregistrer('.$answers['id'].' , '.$i.')" name="enregistrer" id="'.$i.'_btn_enregistrer" class="hide" >Enregister</button></td>';
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
