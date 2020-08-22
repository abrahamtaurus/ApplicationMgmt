<?php
include_once "Login.php";
include_once "LoginSvc.php";

class LoginCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new LoginSvc();        
    }
    public function doPost()
    {
       // $vjsonlogin = json_decode($_POST['applData']);
        $vjsonlogin = json_decode(file_get_contents('php://input'));
        
        $vobjLogin = new Login($vjsonlogin->id, $vjsonlogin->loginId, $vjsonlogin->password, $vjsonlogin->isActive);
        $vobjLogin = $this->vobjApplSvc->save($vobjLogin);
        echo $vobjLogin->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonlogin);  
}
$appl = new LoginCtl();
$appl->doPost();                                                    
?>



