<?php session_start(); ?>
<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title> Calendrier Leçon pilotage</title>
    <link rel="stylesheet" href="CSS/CSS.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>

<body>
  <?php
      include("header.php");
  ?>
  <main>
    <div>
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

        require 'calendar/Date/month.php';
        require 'calendar/reservation_calendrier.php';
        $month = new Calendar\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
        $reservs = new Calendar\Reservation_calendrier();
        $start = $month->getFirstDay();
        $firstday = $start->format('N') === '1' ? $start : $month->getFirstDay()->modify('last monday');
        $weeks = $month->getWeeks();
        $end = (clone $firstday)->modify('+' .(6 + 7 * ($weeks -1)). ' days');
        $reservs = $reservs->getReservationsParJour($firstday, $end);

       ?>

       <div class="d-flex flex-row align-items-center justify-content-between">
        <h1><?= $month->toString(); ?></h1>
        <?php if($_GET['service'] == "lecon_pilotage"){
          if($_SESSION['statut_pilote'] == 0 && $_SESSION['statut_initiation'] == 0){?>
          <h1>Choisir le jour de la formation</h1>
        <?php }else{?>
          <h1>Choisir le jour de votre cours</h1>
        <?php }}else{
          require_once('includes/connexiondb.php');
           $connected = isset($_SESSION['email']) ? true : false;
           $bdd =  connectionDB();
           $q = "SELECT * FROM services WHERE service=:service";

          $req = $bdd -> prepare($q);
          $req -> execute(array(
            'service'=>$_GET['service']
          ));
          $answers_service = $req->fetch();?>
          <h1>Réserver votre <?=$answers_service['nom']?></h1>
        <?php } ?>
        <div>
          <a href="reservation.php?service=<?=$answers_service['service']?>&month=<?= $month->previousMonth()->month ?>&year=<?= $month->previousMonth()->year ?>" class="btn btn-primaty">&lt;</a>
          <a href="reservation.php?service=<?=$answers_service['service']?>&month=<?= $month->nextMonth()->month ?>&year=<?= $month->nextMonth()->year ?>" class="btn btn-primaty">&gt;</a>
        </div>
       </div>

       <div class="description">
           <h2><?=$answers_service['l_description']?></h2>
       </div>
         <?php if(isset($_GET['success'])){?>
              <div class="alert alert-success">
                Réservation prise en compte
              </div>
         <?php } ?>


       <!--<?= $month->getWeeks();?>-->
      <table class="calendrier calendrier_<?= $weeks;?>">
      <?php
        for($i = 0; $i < $weeks; $i++){
      ?>
          <tr>
          <?php foreach ($month->days as $key => $day) {
            $date = (clone $firstday)->modify("+".($key + $i * 7)."day");
            $reservsParJour = $reservs[$date->format('Y-m-d')] ?? [];
            $aujourdhui = date('Y-m-d') ===  $date->format('Y-m-d');
            ?>
            <td class="<?= $month->inMonth($date) ? '' : 'calendrier_hors_mois';?> <?= $aujourdhui ? 'calendrier_aujourdhui' : '';?>">
              <?php if($i === 0){?>
                <div class="calendrier_semaine">
                  <?= $day; ?>
                </div>
              <?php } ?>
              <div class="calendrier_nb_jour">
                <?= $date -> format('d');?>
              </div>
              <?php foreach ($reservsParJour as $reserv) {?>
                <div class="calendrier_reserv">
                  <?= (new DateTime($reserv['debut']))->format('H:i') ?> - <a href="reservation_affichage.php?id=<?= $reserv['id']?>"><?= $reserv['nom'] ?></a>
                </div>
              <?php }?>
            </td>
          <?php } ?>
          </tr>
      <?php }?>
      </table>

      <?php if($_GET['service'] == "lecon_pilotage"){
        if($_SESSION['statut_initiation'] == 0 AND $_SESSION['statut_pilote'] == 0){?>
        <a href="lecon_pilotage_initiation_ajout.php" class="calendrier_ajout">+</a>
      <?php }else {?>
        <a href="lecon_pilotage_ajout.php" class="calendrier_ajout">+</a>
      <?php }}else{?>
        <a href="<?=$_GET['service']?>_ajout.php" class="calendrier_ajout">+</a>
      <?php }?>
    </div>
  </main>
<?php
    include("footer.php");
?>
</body>
