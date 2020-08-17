<?php
include "Loginn.php";
include_once "LoginnRepo.php";
class Loginnsvc
{
	private $loginnrepo;
	public function __construct()
    {
		$this->loginnrepo = new LoginnRepo();
	}
	public function save($pobjloginn){
		if($pobjapplication->getId()==-1)
        {
			$this->insert($pobjloginn);
	     }
      }
}

?> 
