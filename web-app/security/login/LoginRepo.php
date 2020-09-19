<?php
include_once 'Login.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . "/web-app/core/DbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/web-app/security/role/RoleSvc.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/web-app/candidate/CandidateSvc.php";

class LoginRepo
{
    private $dbConn;
    private $roleSvc;
    private $candidateSvc;

    public function __construct(){
        $this->dbConn = DbConnection::getConnection();
        $this->roleSvc = new RoleSvc();
        $this->candidateSvc = new CandidateSvc();
    }

    public function validate($ploginId, $ppwd) {
        $vobjLogin = null;

        $strSQLStmt = "SELECT id, role_id,candidate_id,login_id, pwd, is_active FROM tbl_login WHERE login_id=? AND pwd=? AND is_active=1";

        $stmt = $this->dbConn->prepare($strSQLStmt);

        $stmt->bindParam(1, $ploginId, PDO::PARAM_STR);
        $stmt->bindParam(2, $ppwd, PDO::PARAM_STR);

        $stmt->execute();                                              // Send the SQL Insert command to the database

        $vresultSet = $stmt->fetch(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array

        // Create the login object store in an array as JSON
        if($vresultSet)
            $vobjLogin = new Login($vresultSet["id"], $this->candidateSvc->getById($vresultSet["candidate_id"]),$this->roleSvc->getById($vresultSet["role_id"]),$vresultSet["login_id"], $vresultSet["pwd"], $vresultSet["is_active"]);

        return $vobjLogin;
    }



    function __destruct()
    {
        DbConnection::closeConnection($this->dbConn);
    }
}
?>
