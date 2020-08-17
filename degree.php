<?php
//degree
include 'dbConnection.php';
class degree {
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
  
 public function setname($pname)
  {
	$this->name = $pname;
  }
  
  
  
  public function toJSON()
  {
        return json_encode("{id: $this->id, name:$this->name}");
  }
}
?>