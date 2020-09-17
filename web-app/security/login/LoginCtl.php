<?php
include_once "Login.php";
include_once "LoginSvc.php";

class LoginCtl{
    private $objLoginSvc;

    public function __construct()
    {
        $this->objLoginSvc = new LoginSvc();
    }
    public function doPost()
    {
       // $vjsonLogin = json_decode($_POST['applData']);
        $vjsonLogin = json_decode(file_get_contents('php://input'));

        $loginStatus = $this->vobjApplSvc->validate($_POST["login"], $_POST["pwd"]);

		if($loginStatus)
      if($_SESSION['role']==Login::ADMIN)
			   header("Location: admin-dashboard.html");
      else
        header("Location: student-dashboard.html");
		else
			header("Location: login.html");
    }
}

//$appl = new LoginCtl();
echo "Success";
  // if($_SERVER['REQUEST_METHOD'] === 'POST')
  //    $appl->doPost();
?>
