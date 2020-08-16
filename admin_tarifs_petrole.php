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
  <script src="AJAX/admin_tarifs_petrole.js"></script>
  <main>
    <div class="atitre">
        <h1>Page Admistration De La Redevance Exterieur</h1>
    </div>
    <div class="liens_administration">
      <h2>Groupe Acoustique</h2>
      <table>
        <tr>
          <th>PRODUIT</th>
          <th>HT</th>
          <th>TVA 20%</th>
          <th>TTC</th>
        </tr>
        <?php
        require_once('includes/connexiondb.php');
        $bdd =  connectionDB();
        $q = "SELECT * FROM petrole";

        $req = $bdd -> prepare($q);
        $req -> execute();

        $i = 0;
        while($answers = $req->fetch()) {
          $i++;
            echo '<tr>';
              echo '<td><p class="'.$i.'" id="'.$i.'_txt_produit">'.$answers['produit'].'</p>
              <input type="text" name="produit" class="'.$i.'_input , hide" id="'.$i.'_produit" value="'.$answers['produit'].'"></td>';

              echo '<td><p class="'.$i.'" id="'.$i.'_txt_HT">'.$answers['HT'].'</p>
              <input type="text" name="HT" class="'.$i.'_input , hide" id="'.$i.'_HT" value="'.$answers['HT'].'"></td>';

              echo '<td><p class="'.$i.'" id="'.$i.'_txt_TVA_20p">'.$answers['TVA_20p'].'</p>
              <input type="text" name="TVA_20p" class="'.$i.'_input , hide" id="'.$i.'_TVA_20p" value="'.$answers['TVA_20p'].'"></td>';

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
