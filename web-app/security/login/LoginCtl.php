<?php
include_once "Login.php";
include_once "LoginSvc.php";

class LoginCtl{
    private $objLoginSvc;

    public function __construct(){
        $this->objLoginSvc = new LoginSvc();
    }

    public function doPost(){
      $url = "http://localhost/";
      header('Content-Type: text/plain');
      $vjsnformData = utf8_encode($_POST['formData']); // Don't forget the encoding
      $vobjlogin = json_decode($vjsnformData);

        $loginStatus = $this->objLoginSvc->validate($vobjlogin->login, $vobjlogin->pwd);

    		if($loginStatus)
          if($_SESSION['role']==Login::ADMIN)
    			   $url .= "admin-dashboard.html";
          else
            $url .= "student-dashboard.html";
    		else
        	$url .= "login.html";

        echo $url;
  }
}

$appl = new LoginCtl();

if($_SERVER['REQUEST_METHOD'] === 'POST')
   $appl->doPost();
?>
