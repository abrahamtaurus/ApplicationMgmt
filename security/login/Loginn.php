<?php

class Loginn {
  private $id;
  private $login_id;
  private $password;
  private $isActive;
  private $role;
  public function __construct($pid, $plogin_id, $ppassword, $pisActive,$prole){
	$this->id = $pid;
	$this->login_id = $plogin_id;
	$this->password = $ppassword;
	$this->isActive = $pisActive;
    $this->role = $prole;
    
  }
    public function setId($pid){
	$this->id = $pid;
  }
  
 public function setLogin_ID($plogin_id){
	$this->login_id = $plogin_id;
  }
  
  
   public function setPassword($ppassword){
	$this->password = $ppassword;
  }
 
   public function setIsActive($pisActive){
	$this->isActive = $pisActive;
  }
  public function setRole($prole){
	$this->isrole = $pisrole;
  }
  
  public function toJSON(){
        return json_encode("{id: $this->id, login_id:$this->login_id, password: $this->password, isActive: $this->isActive, role: $this->role }");
    }
}
?>