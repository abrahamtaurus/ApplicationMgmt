

<?php
class Role {
  private $id;
  private $rolename;
  

  public function __construct($pid, $prolename)
  {
	$this->id = $pid;
	$this->rolename = $prolename;
	
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
  
 public function setrolename($prolename)  {
    $this->rolename = $prolename;
  }
  
  public function getrolename()  {
    return $this->rolename;
  }
  
  public function toJSON()
  {
        return json_encode("{id: $this->id, rolename:$this->rolename}");
  }
}
?>
