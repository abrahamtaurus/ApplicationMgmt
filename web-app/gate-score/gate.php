<?php
//Model or dto
include 'DbConnection.php';
class gate {
private $id;
private $examDate;
private $discipline;
private $score;
private $percentile;
private $air;
private $validity;

public function __construct($pid, $pexamDate, $pdiscipline, $pscore,$percentile,$pair,$pvalidity)
{
$this->setid($pid);
$this->setexamDate($pexamDate);
$this->setdiscipline($pdiscipline);
$this->setscore($pscore);
$this->setpercentile($percentile);
$this->setair($pair);
$this->setvalidity($pvalidity);

 }
 
 public function setid($pid)
  {
    $this->id = $pid;
  }

  public function setexamDate($pexamDate)
  {
    $this->examDate = $pexamDate;
  }
 
  public function setdiscipline($pdiscipline)
  {
    $this->discipline = $pdiscipline;
  }
  
  public function setscore($pscore)
  {
    $this->score = $pscore;
  }
  
  public function setpercentile($ppercentile)
  {
    $this->percentile = $ppercentile;
  }
  public function setair($pair)
  {
    $this->air = $pair;
  }
  
  public function setvalidity($pvalidity)
  {
    $this->validity = $pvalidity;
  }
  public function toJSON()
    {
        return json_encode("{id: $this->id, examedate:$this->examDate, discipline: $this->discipline,score:$this->score,percentile:$this->percentile,air:$this->air,validity:$this->validity");
    }
  
}
?>