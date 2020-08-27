/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
class Batch {
  private $id;
  private $year;
  private $isOpen;

  public function __construct($pid,  $pyear, $pisOpen)
  {
	$this->id = $pid;
	$this->year = $pyear;
	$this->isOpen = $pisOpen;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
 
  public function setyear($pyear){
	  return $this->year =$pyear;
  }
 
  public function getyear(){
	  return $this->year;
  }

  public function setisOpen($pisOpen){
	$this->isOpen = $pisOpen;
  }
  
  public function getisOpen(){
	  return $this->isOpen;
  }

  public function toJSON()
  {
        return json_encode("{id: $this->id, year: $this->year, isOpen: $this->isOpen}");
  }
}
?>
