<?php
include_once "Role.php";
include_once "RoleRepo.php";
class RoleSvc
{
	private $roleRepo;
	public function __construct()
    {
		$this->roleRepo = new RoleRepo();
	}
	public function save($pobjRole){
		$vobjRole = $pobjRole;
        if($pobjRole->getId()==-1)
        {
			$vobjRole= $this->roleRepo->insert($pobjRole);
		}
		else
		{
			$vobjRole = $this->roleRepo->update($pobjRole);
		}	  
		return $vobjRole;
	  }
	  
	  
	  public function delete($pobjRole){
		$this->roleRepo->delete($pobjRole);
	  }
	  
}

?> 
