<?php
include_once 'BatchRepo.php';

class BatchSvc {
    public $objRepo;
    
	public function __construct() {
        $this->objRepo = new BatchRepo();
    }
    
    /*
    *   Sends the details of the batch as an object to the Repo to save in the database
    *   If the id of the object is -1 the insert method of the repo is called
    *   If the id of the object > 0 then the update method is called
    *   The updated object of the Batch is returned to the calling function
    */
	public function save($pobjBatch) {
        $vobjBatch = $pobjBatch;
        
		if($pobjbatch->getid()==-1)
			$this->objRepo->insert($pobjBatch);                // Make a request ot the repo to insert the details of the batch into the database
		else
            $this->objRepo->update($pobjBatch);                // Make a request ot the repo to update the details of the batch into the database
            
        return $vobjBatch;
    }
    
    /*
    *   Returns an array of the Batch Objects 
    */
    public function getAll(){
        return $this->objRepo->getAll();                             
    }
    
    /*
    *   Returns an object of the Batch
    */
    public function getById($pid){
        return $this->objRepo->getById($pid);                       
    }
        
    /*
    *   Returns an array of the Batch as JSON Objects 
    */
    public function getAllAsJSON(){
        
        $vbatchList =  $this->getAll();
        $noBatches = count($vbatchList);
        for($ctr=0; $ctr<$noBatches; $ctr++){
            $vbatchList[$ctr] = $vbatchList[$ctr]->toJSON();
        }
        return $vbatchList;
    }
    
    /*
    *   Returns an object of the Batch as an JSON object
    */
    public function getByIdAsJSON($pid){
        return $this->getById($pid)->toJSON();
    }
}

?>
