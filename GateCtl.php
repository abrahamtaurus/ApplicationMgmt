
/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Gate.php";
include_once "GateSvc.php";

class GateCtl
{
    private $vobjApplSvc;
    private $applData;
    function __construct()
    {
        $this->vobjApplSvc = new GateSvc();        
    }
    public function doPost()
    {
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsongate = json_decode(file_get_contents('php://input'));
        //var_dump($vjsongate);
        $vobjgate = new Gate($vjsongate->id,$vjsongate->examDate, $vjsongate->discipline,$vjsongate->score,$vjsongate->percentile,$vjsongate->air,$vjsongate->validity);
        $vobjgate = $this->vobjApplSvc->save($vobjgate);
        echo $vobjgate->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCandidate);  
}
$appl = new GateCtl();
$appl->doPost();                                                    
?>
