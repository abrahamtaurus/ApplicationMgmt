<?php
include_once "batch.php";
#include_once "batchsvc.php";


class batchctl
{
    private $vobjApplSvc;
    function __construct()
    {
        //$this->vobjApplSvc = new CandidateSvc();        
    }
    public function doPost()
    {
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsonbatch = json_decode(file_get_contents('php://input'));
        var_dump($vjsonbatch);
        $vobjbatch = new batch($vjsonbatch->id,$vjsonbatch->course_id, $vjsonbatch->year_2, $vjsonbatch->is_open);
        
        echo $vobjbatch->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCandidate);  
}
$appl = new batchctl();
$appl->doPost();                                                    
?>