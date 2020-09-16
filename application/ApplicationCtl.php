<?php
include_once "Application.php";
include_once "ApplicationSvc.php";

class ApplicationCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new ApplicationSvc();        
    }
    public function doPost()
    {
       // $vjsonapplication = json_decode($_POST['applData']);
        $vjsonapplication = json_decode(file_get_contents('php://input'));
        
        $vobjApplication = new Application($vjsonapplication->id, $vjsonapplication->applicationNo, $vjsonapplication->submissionDate, $vjsonapplication->status);
        $vobjApplication = $this->vobjApplSvc->save($vobjApplication);
        echo $vobjApplication->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonapplication);  
}
$appl = new ApplicationCtl();
$appl->doPost();                                                    
?>


