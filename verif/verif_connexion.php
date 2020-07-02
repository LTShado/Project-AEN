<?php
  require_once('../includes/connexiondb.php');

  $bdd= connectionDB();

  //verification de l'existance de l'email dans le post
  if(!isset($_POST['email']) || empty($_POST['email'])){
    echo "email invalide" ;
  	exit;
  }

  //verification du format de l'email
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo "email pas du bon format" ;
  	exit;
  }

  //verification de l'existance du mdp dans le post
  if(!isset($_POST['mdp']) || empty($_POST['mdp'])){
    echo "mot de passe invalide" ;
  	exit;
  }

  // REQUETE PREPAREE (PROTECTION CONTRE L'INJECTION SQL)

  $req = $bdd->prepare('SELECT * FROM client WHERE email= :email && mdp= :mdp');
  $req->execute([
  	'email' => htmlspecialchars($_POST['email']),
  	'mdp' => hash('sha256', $_POST['mdp'])
  ]);
  $answers = $req ->  rowCount();
  if($answers > 0){
    session_start ();
  		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
      $answers = $req -> fetch();
      $_SESSION['email'] = $answers['email'];
      $_SESSION['nom'] = $answers['nom'];
      $_SESSION['prenom'] = $answers['prenom'];

  		echo "ok";
  }
else{

	echo 'email ou mot de passe non reconnue';
	exit;
}
?>
