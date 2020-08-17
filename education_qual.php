<?php
//Model or dto
include "dbConnection.php";
class education_qual 
{ 
	private $id; 
	private $degree_id; 
	private $candidate_id; 
	private $name; 
	private $degree; 
	private $university; 
	private $degree_yr; 
	private $subject;
	private $class1;
	private $percentage;

	public function __construct($pid,$pdegree_id,$pcandidate_id,$pname, $pdegree, $puniversity, $pdegree_yr, $psubject, $pclass1, $ppercentage)
	{ 
	$this->id=$pid; 
	$this->degree_id=$pdegree_id; 
	$this->candidate_id=$pcandidate_id; 
	$this->name=$pname; 
	$this->degree=$pdegree; 
	$this->university=$puniversity; 
	$this->degree_yr=$pdegree_yr;
	$this->subject=$psubject; 
	$this->class1=$pclass1; 
	$this->percentage=$ppercentage; 
	 } 
	 
	 public function setid($pid)
	  {
	  $this->id = $pid;
	  }
	  
	  public function setdegree_id($pdegree_id)
	  {
	  $this->degree_id = $pdegree_id;
	  }
	  
	  public function setcandidate_id($pcandidate_id)
	  {
	  $this->candidate_id = $pcandidate_id;
	  }
	  
	  public function setname($pname)
	  {
	  $this->name = $pname;
	  }
	  
	  public function setdegree($pdegree)
	  {
	  $this->degree = $pdegree;
	  }
	  
	  public function setuniversity($puniversity)
	  {
	  $this->university = $puniversity;
	  }
	
	  public function setdegree_yr($pdegree_yr)
	  {
	  $this->degree_yr = $pdegree_yr;
	  }
	 
	   public function setsubject($psubject)
	  {
	  $this->subject = $psubject;
	  }
	  
	  public function setclass1($pclass1)
	  {
	  $this->class1 = $pclass1;
	  }
	 
	  public function setpercentage($ppercentage)
	  {
	  $this->percentage = $ppercentage;
	  }
	  public function toJSON()
	  {
        return json_encode("{id: $this->id, degree_id: $this->degree_id, candidate_id: $this->candidate_id, name: $this->name, degree:$this->degree,university: $this->university,degree_yr: $this->degree_yr,subject: $this->subject,class1:$this->class1,percentage: $this->percentage}");
      
	  }
	  
}
	 
 ?>
 
 