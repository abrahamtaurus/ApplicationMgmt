

<?php
class Login {
  private $id;
  private $loginId;
  private $password;
  private $isActive;

  public function __construct($pid, $ploginId, $ppassword, $pisActive)
  {
	$this->id = $pid;
	$this->loginId = $ploginId;
	$this->password = $ppassword;
	$this->isActive = $pisActive;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
  
 public function setLoginId($ploginId)  {
    $this->loginId = $ploginId;
  }
  
  public function getLoginId()  {
    return $this->loginId;
  }
  
 
  public function setPassword($ppassword){
	  return $this->password =$ppassword;
  }
 
  public function getPassword(){
	  return $this->password;
  }

  public function setIsActive($pisActive){
	$this->isActive = $pisActive;
  }
  
  public function getIsActive(){
	  return $this->isActive;
  }

  public function toJSON()
  {
        return json_encode("{id: $this->id, loginId:$this->loginId, password: $this->password, isActive: $this->isActive}");
  }
}
?>
