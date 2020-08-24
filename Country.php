/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
class Country {
  private $id;
  private $name;
  private $host;

  public function __construct($pid, $pname, $phost)
  {
	$this->id = $pid;
	$this->name = $pname;
	$this->host = $phost;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
  
 public function setname($pname)  {
    $this->name = $pname;
  }
  
  public function getname()  {
    return $this->name;
  }
  
 
  public function sethost($phost){
	   $this->name =$phost;
  }
 
  public function gethost(){
	  return $this->host;
  }

  public function toJSON()
  {
        return json_encode("{id: $this->id, name:$this->name, host: $this->host}");
  }
}
?>
