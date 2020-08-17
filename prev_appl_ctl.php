<?php
//prev_appl_ctl
include_once "prev_appl.php";
#include_once "prev_appl_svc.php";

class prev_appl_ctl
{
    private $vobjprev_appl_svc;
    public function __construct()
    {
            
    }
    public function doPost()
    {
       
        $vjsonprev_appl = json_decode(file_get_contents('php://input'));
        #var_dump($vjsonprev_appl,true);
        $vobjprev_appl = new prev_appl($vjsonprev_appl->id, $vjsonprev_appl->candidate_id,$vjsonprev_appl->application_no,$vjsonprev_appl->appl_batch);
        
        echo $vobjprev_appl->toJSON();
    
    }    
    
}
$edu = new prev_appl_ctl();
$edu->doPost();                                                    
?>