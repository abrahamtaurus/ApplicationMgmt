/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Batch.php";
include_once "BatchRepo.php";
class BatchSvc
{
	private $batchRepo;
	public function __construct()
    {
		$this->batchRepo = new BatchRepo();
	}
	public function save($pobjBatch){
		$vobjBatch = $pobjBatch;
        if($pobjBatch->getId()==-1)
        {
			$vobjBatch = $this->batchRepo->insert($pobjBatch);
		}
		else
		{
			$vobjBatch = $this->batchRepo->update($pobjBatch);
		}	  
		return $vobjBatch;
	  }
	  
	  
	  public function delete($pobjBatch){
		$this->batchRepo->delete($pobjBatch);
	  }
	  
}

?> 
