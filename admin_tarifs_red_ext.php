<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Admin Redevance Exterieur</title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <script src="AJAX/admin_tarifs_red_ext.js"></script>
  <main>
    <div class="atitre">
        <h1>Page Admistration De La Redevance Exterieur</h1>
    </div>
    <div class="liens_administration">
      <h2>Groupe Acoustique</h2>
      <table>
        <tr>
          <th>Hors Taxes</th>
          <th>TVA</th>
          <th>TTC</th>
        </tr>
        <?php
        require_once('includes/connexiondb.php');
        $bdd =  connectionDB();
        $q = "SELECT * FROM redevance_stationnement_ext";

        $req = $bdd -> prepare($q);
        $req -> execute();

        $i = 0;
        while($answers = $req->fetch()) {
          $i++;
            echo '<tr>';
              echo '<td><p class="'.$i.'" id="'.$i.'_txt_HT">'.$answers['Hors_Taxes'].'</p>
              <input type="text" name="HT" class="'.$i.'_input , hide" id="'.$i.'_HT" value="'.$answers['Hors_Taxes'].'"></td>';

              echo '<td><p class="'.$i.'" id="'.$i.'_txt_TVA">'.$answers['TVA'].'</p>
              <input type="text" name="TVA" class="'.$i.'_input , hide" id="'.$i.'_TVA" value="'.$answers['TVA'].'"></td>';

              echo '<td><p class="'.$i.'" id="'.$i.'_txt_TTC">'.$answers['TTC'].'</p>
              <input type="text" name="TTC" class="'.$i.'_input , hide" id="'.$i.'_TTC" value="'.$answers['TTC'].'"></td>';

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
