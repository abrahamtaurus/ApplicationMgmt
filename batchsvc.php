<?php
include 'batch.php';

class batchsvc
{
    public $objRepo;
	public function __construct()
	{
        $this->objRepo = new batchrepo();
    }
	public function save($pobjbatch)
	{
		if($pobjbatch->getid()==-1)
		{
			$this->objRepo->insert($pobjbatch);
		}
    }
}

?>
