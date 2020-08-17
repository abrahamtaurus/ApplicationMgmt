<?php
include 'gate.php';

class gatesvc
{
    public $objRepo;
	public function __construct()
	{
        $this->objRepo = new gaterepo();
    }
	public function save($pobjgate)
	{
		if($pobjgate->getid()==-1)
		{
			$this->objRepo->insert($pobjgate);
		}
    }
}

?>
