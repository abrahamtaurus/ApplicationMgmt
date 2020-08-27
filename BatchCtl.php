/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Batch.php";
include_once "BatchSvc.php";

class BatchCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new BatchSvc();        
    }
    public function doPost()
    {
       // $vjsonBatch = json_decode($_POST['applData']);
        $vjsonbatch = json_decode(file_get_contents('php://input'));
        
        $vobjBatch = new Batch($vjsonbatch->id, $vjsonbatch->course_id, $vjsonbatch->year_2, $vjsonbatch->is_open);
        $vobjBatch = $this->vobjApplSvc->save($vobjBatch);
        echo $vobjBatch->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonBatch);  
}
$appl = new BatchCtl();
$appl->doPost();                                                    
?>
