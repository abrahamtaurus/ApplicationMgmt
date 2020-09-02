/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Prev_appl.php";
include_once "Prev_applRepo.php";
class Prev_applSvc
{
	private $prev_applRepo;
	public function __construct()
    {
		$this->prev_applRepo = new Prev_applRepo();
	}
	public function save($pobjPrev_appl){
		$vobjPrev_appl = $pobjPrev_appl;
        if($pobjPrev_appl->getId()==-1)
        {
			$vobjPrev_appl = $this->prev_applRepo->insert($pobjPrev_appl);
		}
		else
		{
			$vobjPrev_appl = $this->prev_applRepo->update($pobjPrev_appl);
		}	  
		return $vobjPrev_appl;
	  }
	  
	  
	  public function delete($pobjPrev_appl){
		$this->prev_applRepo->delete($pobjPrev_appl);
	  }
	  
}

?> 
