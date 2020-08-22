<?php
include_once "Login.php";
include_once "LoginRepo.php";
class LoginSvc
{
	private $loginRepo;
	public function __construct()
    {
		$this->loginRepo = new LoginRepo();
	}
	public function save($pobjLogin){
		$vobjLogin = $pobjLogin;
        if($pobjLogin->getId()==-1)
        {
			$vobjLogin = $this->loginRepo->insert($pobjLogin);
		}
		else
		{
			$vobjLogin = $this->loginRepo->update($pobjLogin);
		}	  
		return $vobjLogin;
	  }
	  
	  
	  public function delete($pobjLogin){
		$this->loginRepo->delete($pobjLogin);
	  }
	  
}

?> 
