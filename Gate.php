/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
//Model or dto
class Gate {
private $id;
private $examDate;
private $Discipline;
private $score;
private $percentile;
private $AIR;
private $validity;

public function __construct($pid, $pexamDate, $pDiscipline, $pscore,$percentile,$pAIR,$pvalidity)
{
$this->setid($pid);
$this->setexamDate($pexamDate);
$this->setDiscipline($pDiscipline);
$this->setscore($pscore);
$this->setpercentile($percentile);
$this->setAIR($pAIR);
$this->setvalidity($pvalidity);

 }
 
 public function setId($pid)
  {
    $this->id = $pid;
  }
  public function getId(){
    return $this->id;
  }

  public function setexamDate($pexamDate)
  {
    $this->examDate = $pexamDate;
  }
  public function getexamDate(){
    return $this->examDate;
  }
 
  public function setDiscipline($pDiscipline)
  {
    $this->Discipline = $pDiscipline;
  }
  public function getDiscipline(){
    return $this->Discipline;
  }
  
  public function setscore($pscore)
  {
    $this->score = $pscore;
  }
  public function getscore(){
    return $this->score;
  }
  
  public function setpercentile($ppercentile)
  {
    $this->percentile = $ppercentile;
  }
  public function getpercentile(){
    return $this->percentile;
  }
  public function setAIR($pAIR)
  {
    $this->AIR = $pAIR;
  }
  public function getAIR(){
    return $this->AIR;
  }
  
  public function setvalidity($pvalidity)
  {
    $this->validity = $pvalidity;
  }
  public function getvalidity(){
    return $this->validity;
  }
  public function toJSON()
    {
        return json_encode("{id: $this->id, examedate:$this->examDate, Discipline: $this->Discipline,score:$this->score,percentile:$this->percentile,AIR:$this->AIR,validity:$this->validity");
    }
  
}
?>
