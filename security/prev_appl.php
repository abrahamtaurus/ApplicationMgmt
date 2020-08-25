<?php
//Model or dto
include "dbConnection.php";
class prev_appl 
{ 
	private $id; 
	private $candidate_id; 
	private $application_no; 
	private $appl_batch; 

	public function __construct($pid, $pcandidate_id, $papplication_no, $pappl_batch)
	{ 
	$this->id=$pid; 
	$this->candidate_id=$pcandidate_id; 
	$this->application_no=$papplication_no; 
	$this->appl_batch=$pappl_batch;
	} 
	 
	 public function setid($pid)
	  {
	  $this->id = $pid;
	  }
	  
	  public function setcandidate_id($pcandidate_id)
	  {
	  $this->candidate_id = $pcandidate_id;
	  }
	  
	  public function setapplication_no($papplication_no)
	  {
	  $this->application_no = $papplication_no;
	  }
	
	  public function setappl_batch($pappl_batch)
	  {
	  $this->appl_batch = $pappl_batch;
	  }
	 
	  public function toJSON()
	  {
        return json_encode("{id: $this->id,candidate_id:$this->candidate_id, application_no: $this->application_no, appl_batch:$this->appl_batch}");
      
	  }
	  
}
	 
 ?>