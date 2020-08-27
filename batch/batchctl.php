<?php
include_once "Batch.php";
include_once "BatchSvc.php";


class BatchCtl
{
    private $objBatchSvc;
    
    function __construct() {
        $this->objBatchSvc = new BatchSvc();        
    }
    
    /*
    *   Serve the HTTP POST requests 
    *   Request to insert into the database the new Batch or 
    *   update thr database with Batch details modified  
    */
    public function doPost(){
        $vjsonBatch = json_decode(file_get_contents('php://input'));
        var_dump($vjsonBatch);
        $vobjBatch = new batch($vjsonBatch->id,$vjsonBatch->course_id, $vjsonBatch->year_2, $vjsonBatch->is_open);
        
        echo $this->$objBatchSvc->save($vobjBatch);    
    }    
    
    /*
    *   Serve the HTTP GET requests 
    *   Request to return detials od songle or multiple batches   
    */
    public function doGet(){
        $vobjBatch;
        
        if(count($_GET)>0)
            $vjsonBatch = $this->objBatchSvc->getByIdAsJSON($_GET['id']);
        else
            $vjsonBatch = $this->objBatchSvc->getAllAsJSON();
        
        echo json_encode($vjsonBatch);
    }    
}

$appl = new BatchCtl();

if($_SERVER['REQUEST_METHOD'] === 'POST') 
     $appl->doPost();
else
     $appl->doGet();
                                                    
?>