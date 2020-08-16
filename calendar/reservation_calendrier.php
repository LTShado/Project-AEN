<?php
namespace Calendar;

require_once('includes/connexiondb.php');

class Reservation_calendrier {


  public function getReservations(\DateTime $debut, \DateTime $fin) :array {

    $bdd= connectionDB();
    $q = "SELECT id FROM client WHERE email=:email";
    $req_id = $bdd->prepare($q);
    $req_id->execute(array(
      'email'=>$_SESSION['email'],
    ));
    $answers=$req_id->fetch();


    $q = "SELECT * FROM reservation WHERE id_client=:id_client AND debut BETWEEN '{$debut->format('Y-m-d 00:00:00')}' AND '{$fin->format('Y-m-d 23:59:59')}'";
    $req = $bdd->prepare($q);
    $req->execute(array(
      'id_client'=>$answers['id']
    ));
    $answers = $req->fetchAll();
    return $answers;
  }

  public function getReservationsParJour(\DateTime $debut, \DateTime $fin) :array {
    $reservs = $this->getReservations($debut, $fin);
    $days = [];
    foreach ($reservs as $reserv) {
      $date = explode(' ', $reserv['debut'])[0];
      if (!isset($days[$date])) {
        $days[$date] = [$reserv];
      }else {
        $days[$date][] = $reserv;
      }
    }
    return $days;
  }

  public function chercher (int $id): array {

      $bdd= connectionDB();
      $q = "SELECT * FROM reservation WHERE id = $id";
      $req = $bdd->prepare($q);
      $req->execute(array());
      $answers = $req->fetch();
      if ($answers == false){
        throw new \Exception("Aucun résultat");
      }
      return $answers;
  }

}



 ?>
