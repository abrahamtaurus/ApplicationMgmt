<?php
include_once "Loginn.php";
#include_once "Loginnsvc.php";

class LoginnCtl
{
    private $vobjApplSvc;
    function __construct()
    {
        //$this->vobjApplSvc = new LoginnSvc();        
    }
    public function doPost()
    {
       //$vjsonLoginn = json_decode($_POST['applData']);
        $vjsonLoginn = json_decode(file_get_contents('php://input'));
        //var_dump($vjsonApplication,true);
        $vobjLoginn = new Loginn($vjsonLoginn->id, $vjsonLoginn->login_id, $vjsonLoginn->password, $vjsonLoginn->isActive, $vjsonLoginn->role);
        
        echo $vobjLoginn->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonLoginn);  
}
$appl = new LoginnCtl();
$appl->doPost();                                                    
?>