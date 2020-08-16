<?php
include 'dbConnection.php';
class Experience {
  private $id;
  private $candidate_id;
  private $emp_name;
  private $emp_address;
  private $fromDt;
  private $toDate;
  private $nature_work;

  public function __construct($pid,$pcandidateId,$pempName,$pempAddr,$pfromDt,$ptoDate,$pnatureWork)
  {
    $this->id = $pid;
	  $this->candidate_id = $pcandidateId;
	  $this->emp_name = $pempName;
	  $this->emp_address = $pempAddr;
    $this->fromDt = $pfromDt;
    $this->toDate = $ptoDate;
    $this->nature_work = $pnatureWork;
  }
  
  public function setid($pid)
  {
	$this->id = $pid;
  }
  
  public function setcandidate_id($pcandidateId)
  {
	$this->candidate_id = $pid;
  }
  
 public function setemp_name($pempName)
  {
	$this->emp_name = $pemployerName;
  }
  
  
  public function setemp_address($pempAddr)
  {
	$this->emp_addr = $pempAddr;
  }
 
  public function setfromDt($pfromDt)
  {
	$this->fromDT = $pfromDt;
  }

  public function setoDate($ptoDate)
  {
	$this->toDate = $ptoDate;
  }

  public function setnature_work($pnatureWork)
  {
  $this->nature_work = $pnatureWork;
  }

  public function toJSON()
  {
        return json_encode("{id: $this->id,candidate_id: $this->candidate_id, emp_name:$this->emp_name, emp_address: $this->emp_address, fromDt: $this->fromDt, toDate: $this->toDate, nature_work: $this->nature_work}");
  }
}
?>