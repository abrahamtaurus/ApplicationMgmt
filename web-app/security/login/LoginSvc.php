<?php

include_once "LoginRepo.php";

class LoginSvc{

	private $loginRepo;

	public function __construct(){
		$this->loginRepo = new LoginRepo();
	}

	public function validate($ploginId, $ppwd){
		$loginStatus = false;

		$vobjLogin = $this->loginRepo->validate($ploginId, $ppwd);

		if($vobjLogin!=null){
			$loginStatus = true;

			session_start();
			$_SESSION['id'] = $vobjLogin->getId();
			$_SESSION['role'] = $vobjLogin->getRole()->getId();
			$_SESSION['candidateId'] = $vobjLogin->getCandidate();
		}

		return $loginStatus;
	  }

}

?>
