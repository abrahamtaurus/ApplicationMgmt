<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 25/08/2020
**/
class EducationQual 
{ 
	private $id; 
	private $degree; 
	private $University; 
	private $year; 
	private $subject;
	private $class;
	private $percentage;

	public function __construct($pid, $pdegree, $pUniversity, $pyear, $psubject, $pclass, $ppercentage)
	{ 
	$this->id=$pid; 
	$this->degree=$pdegree; 
	$this->University=$pUniversity; 
	$this->year=$pyear;
	$this->subject=$psubject; 
	$this->class=$pclass; 
	$this->percentage=$ppercentage; 
	 } 
	 
	  public function setid($pid)
	  {
	  $this->id = $pid;
	  }
	   public function getid()
	   {
       return $this->id;
	   }
	  
	  public function setdegree($pdegree)
	  {
	  $this->degree = $pdegree;
	  }
	  public function getdegree()
	   {
       return $this->degree;
	   }
	   
	  public function setUniversity($pUniversity)
	  {
	  $this->University = $pUniversity;
	  }
	  public function getUniversity()
	   {
       return $this->University;
	   }
	   
	  public function setyear($pyear)
	  {
	  $this->year = $pyear;
	  }
	  public function getyear()
	   {
       return $this->year;
	   }
	 
	   public function setsubject($psubject)
	  {
	  $this->subject = $psubject;
	  }
	  public function getsubject()
	   {
       return $this->subject;
	   }
	   
	  public function setclass($pclass)
	  {
	  $this->class = $pclass;
	  }
	  public function getclass()
	   {
       return $this->class;
	   }
	 
	  public function setpercentage($ppercentage)
	  {
	  $this->percentage = $ppercentage;
	  }
	  public function getpercentage()
	   {
       return $this->percentage;
	   }
	   
	  public function toJSON()
	  {
        return json_encode("{id: $this->id, degree:$this->degree,University: $this->University,year: $this->year,subject: $this->subject,class:$this->class,percentage: $this->percentage}");
      
	  }
	  
}
	 
 ?>
 
 
