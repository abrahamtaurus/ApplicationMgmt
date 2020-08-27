/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once 'Gate.php';
include_once 'GateRepo.php';

class GateSvc
{
    private $gateRepo;
	function __construct()
	{
        $this->gateRepo = new GateRepo();
    }
	public function save($pobjgate)
	{
		$vobjgate = $pobjgate;
        if($pobjgate->getId()==-1)
        {
			$vobjgate = $this->gateRepo->insert($pobjgate);
		}
		else
		{
			$vobjgate = $this->gateRepo->update($pobjgate);
		}
		return $vobjgate;	  
	}
	public function delete($pobjgate)
	{
		$this->gateRepo->delete($pobjgate);
	}
}

?>
