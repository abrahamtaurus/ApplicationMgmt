<?php
include "Role.php";
include_once "RoleRepo.php";
class Rolesvc
{
	private $rolerepo;
	public function __construct()
    {
		$this->rolerepo = new RoleRepo();
	}
	public function save($pobjrole){
		if($pobjapplication->getId()==-1)
        {
			$this->insert($pobjrole);
	     }
      }
}

?> 
