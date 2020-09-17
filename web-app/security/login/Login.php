<?php
class Login {
   const ADMIN = 1;
   const STUDENT = 2;
  
  private $id;
  private $loginId;
  private $password;
  private $isActive;
  private $role;
  private $candidate;

  public function __construct($pid,$pcandidate,$prole, $ploginId, $ppassword, $pisActive)
  {
  $this->id = $pid;
  $this->setCandidate($pcandidate);
  $this->setRole($prole);
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
  public function setCandidate($pcandidate){
    $this->candidate = $pcandidate;
}

public function getCandidate(){
    return $this->candidate;
}
  public function setRole($prole){
    $this->role = $prole;
}

public function getRole(){
    return $this->role;
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
        return json_encode("{id: $this->id,role_id:".$this->role->toJSON()."loginId:$this->loginId, password: $this->password, isActive: $this->isActive}");
  }
}
?>
