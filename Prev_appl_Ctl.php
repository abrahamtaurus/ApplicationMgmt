
/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Prev_appl.php";
include_once "Prev_applSvc.php";

class Prev_applCtl
{
    private $vobjApplSvc;
    private $applData;
    function __construct()
    {
        $this->vobjApplSvc = new Prev_applSvc();        
    }
    public function doPost()
    {
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsonprev_appl = json_decode(file_get_contents('php://input'));
        //var_dump($vjsonprev_appl);
        $vobjprev_appl = new Prev_appl($vjsonprev_appl->id,$vjsonprev_appl->date_1, $vjsonprev_appl->application_no);
        $vobjprev_appl = $this->vobjApplSvc->save($vobjprev_appl);
        echo $vobjprev_appl->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCandidate);  
}
$appl = new Prev_applCtl();
$appl->doPost();                                                    
?>
