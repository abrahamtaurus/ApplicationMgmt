<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 24/08/2020
**/
class Degree {
  private $id;
  private $name;
 

  public function __construct($pid, $pname)
  {
	$this->id = $pid;
	$this->name = $pname;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }
  
  public function getId()
  {
    return $this->id;
  }
  
 public function setname($pname)
  {
	$this->name = $pname;
  }
  
  public function getname()
  {
    return $this->name;
  }
  
  
  public function toJSON()
  {
        return json_encode("{id: $this->id, name:$this->name}");
  }
}
?>