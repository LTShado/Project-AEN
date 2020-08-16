<?php

namespace Calendar\Date;

class Month {

  private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
  public $month;
  public $year;
  public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

  public function __construct(?int $month = null, ?int $year = null){

    if($month === null || $month < 1 || $month > 12){
      $month = date('m');
    }

    if($year === null){
      $year = intval(date('Y'));
    }
    $this->month =$month;
    $this->year =$year;
  }

  public function getFirstDay (): \DateTime {
    return new \DateTime("{$this->year}-{$this->month}-1");
  }

  public function toString(): string {
    return $this->months[$this->month - 1] . ' ' .$this->year;
  }

  public function getWeeks(): int {
    $first = $this->getFirstDay();
    $last = (clone $first)->modify('+1 month -1 day');
    //var_dump($first->format('W'),$last->format('W'));
    $weeks = intval($last->format('W')) - intval($first->format('W')) + 1;
    if($weeks < 0){
      $weeks = intval($last->format('W'));
    }
    return $weeks;
  }

  public function inMonth(\DateTime $date): bool {
    return $this->getFirstDay()->format('Y-m') === $date->format('Y-m');


  }

  public function nextMonth(): Month {
    $month = $this->month + 1;
    $year = $this->year;
    if ($month  > 12) {
      $month = 1;
      $year += 1;
    }
    return new Month($month, $year);
  }

  public function previousMonth(): Month {
    $month = $this->month - 1;
    $year = $this->year;
    if ($month  < 1) {
      $month = 12;
      $year -= 1;
    }
    return new Month($month, $year);
  }


}


 ?>
