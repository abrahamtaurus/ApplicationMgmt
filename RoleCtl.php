<?php
include_once "Role.php";
#include_once "Rolesvc.php";

class RoleCtl
{
    private $vobjApplSvc;
    function __construct()
    {
        //$this->vobjApplSvc = new RoleSvc();        
    }
    public function doPost()
    {
       //$vjsonRole = json_decode($_POST['applData']);
        $vjsonRole = json_decode(file_get_contents('php://input'));
        //var_dump($vjsonRole,true);
        $vobjRole = new Role($vjsonRole->id, $vjsonRole->name);
        
        echo $vobjRole->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonRole);  
}
$appl = new RoleCtl();
$appl->doPost();                                                    
?>