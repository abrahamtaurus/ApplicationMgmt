/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
class Application {
  private $id;
  private $applicationNo;
  private $submissionDate;
  private $status;

  public function __construct($pid, $papplicationNo, $psubmissionDate, $pstatus)
  {
	$this->id = $pid;
	$this->applicationNo = $papplicationNo;
	$this->submissionDate = $psubmissionDate;
	$this->status = $pstatus;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
  
 public function setapplicationNo($papplicationNo)  {
    $this->applicationNo = $papplicationNo;
  }
  
  public function getapplicationNo()  {
    return $this->applicationNo;
  }
  
 
  public function setsubmissionDate($psubmissionDate){
	  return $this->submissionDate =$psubmissionDate;
  }
 
  public function getsubmissionDate(){
	  return $this->submissionDate;
  }

  public function setstatus($pstatus){
	$this->status = $pstatus;
  }
  
  public function getstatus(){
	  return $this->status;
  }

  public function toJSON()
  {
        return json_encode("{id: $this->id, applicationNo:$this->applicationNo, submissionDate: $this->submissionDate, status: $this->status}");
  }
}
?>