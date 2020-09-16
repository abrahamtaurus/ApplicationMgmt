<?php
include 'Experience.php';


class ExperienceCtl
{
    private $vobjApplSvc;
    public function __construct()
    {
        //$this->vobjApplSvc = new ApplicationSvc();        
    }
    public function doPost()
    {
       // $vjsonApplication = json_decode($_POST['applData']);
        $vjsonexperience = json_decode(file_get_contents('php://input'));
        
        $vobjexperience = new Experience($vjsonexperience->id, $vjsonexperience->candidate_id, $vjsonexperience->emp_name, $vjsonexperience->emp_address, $vjsonexperience->fromDt,$vjsonexperience->toDate,$vjsonexperience->nature_work);
        
        echo $vobjexperience->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonApplication);  
}
$exp= new ExperienceCtl();
$exp->doPost();
?>