<?php
include_once "Role.php";
include_once "RoleSvc.php";

class RoleCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new RoleSvc();        
    }
    public function doPost()
    {
       // $vjsonrole = json_decode($_POST['applData']);
        $vjsonrole = json_decode(file_get_contents('php://input'));
        
        $vobjRole = new Role($vjsonrole->id, $vjsonrole->rolename);
        $vobjRole = $this->vobjApplSvc->save($vobjRole);
        echo $vobjRole->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonRole);  
}
$appl = new RoleCtl();
$appl->doPost();                                                    
?>



