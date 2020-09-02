/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
class Prev_appl {
  private $id;
  private $date;
  private $applicationNo;

  public function __construct($pid, $pdate, $papplicationNo)
  {
  $this->id = $pid;

	$this->date = $pdate;
	$this->applicationNo = $papplicationNo;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
 
  public function setdate($pdate)
  {
	  return $this->date =$pdate;
  }
 
  public function getdate(){
	  return $this->date;
  }

  public function setapplicationNo($papplicationNo){
	$this->applicationNo = $papplicationNo;
  }
  
  public function getapplicationNo(){
	  return $this->applicationNo;
  }

  public function toJSON()
  {
        return json_encode("{id: $this->id, date: $this->date, applicationNo: $this->applicationNo}");
  }
  public function toString()
  {
        return "{id: $this->id, date: $this->date, applicationNo: $this->applicationNo}";
  }
}
?>
