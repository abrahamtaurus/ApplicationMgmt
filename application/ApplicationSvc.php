/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
include_once "Application.php";
include_once "ApplicationRepo.php";
class ApplicationSvc
{
	private $applicationRepo;
	public function __construct()
    {
		$this->applicationRepo = new ApplicationRepo();
	}
	public function save($pobjApplication){
		$vobjApplication = $pobjApplication;
        if($pobjApplication->getId()==-1)
        {
			$vobjApplication = $this->applicationRepo->insert($pobjApplication);
		}
		else
		{
			$vobjApplication = $this->applicationRepo->update($pobjApplication);
		}	  
		return $vobjApplication;
	  }
	  
	  
	  public function delete($pobjApplication){
		$this->applicationRepo->delete($pobjApplication);
	  }
	  
}

?>