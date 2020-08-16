<?php

require_once('../includes/connexiondb.php');

$bdd= connectionDB();

$q = "DELETE FROM reservation WHERE id=:id";
$req = $bdd->prepare($q);

$req->execute(array(
  'id'=> $_POST['id']
  )
);

echo "ok";
 ?>
