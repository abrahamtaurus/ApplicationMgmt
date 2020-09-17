<?php
include_once "gate.php";
#include_once "gatesvc.php";

class gatectl
{
    private $vobjApplSvc;
    function __construct()
    {
        //$this->vobjApplSvc = new CandidateSvc();        
    }
    public function doPost()
    {
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsongate = json_decode(file_get_contents('php://input'));
        var_dump($vjsongate);
        $vobjgate = new gate($vjsongate->id, $vjsongate->examDate, $vjsongate->discipline,$vjsongate->score,$vjsongate->percentile,$vjsongate->air,$vjsongate->validity);
        
        echo $vobjgate->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCandidate);  
}
$appl = new gatectl();
$appl->doPost();                                                    
?>