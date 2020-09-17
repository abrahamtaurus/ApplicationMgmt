<?php
include_once 'Login.php';
include_once  "../../core/dbConnection.php";
include_once "../Role/RoleSvc.php";
include_once "../Candidate/CandidateSvc.php";

class LoginRepo
{
    private $dbConn;
    private $roleSvc;
    public function __construct()
    {
        $this->dbConn = dbConnection::getConnection();
        $this->roleSvc = new RoleSvc();
    }

    public function validate($ploginId, $ppwd) {
        $vobjLogin = null;

        $strSQLStmt = "SELECT id, role_id,candidate_id,login_id pwd, is_active FROM tbl_login WHERE login_id=? AND pwd=?";

        $stmt = $this->dbConn->prepare($strSQLStmt);

        $stmt->bindParam(1, $ploginId, PDO::PARAM_STRING);
        $stmt->bindParam(2, $ppwd, PDO::PARAM_STRING);

        $stmt->execute();                                              // Send the SQL Insert command to the database

        $vresultSet = $stmt->fetch(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array

        // Create the login object store in an array as JSON
        if($vresultSet)
            $vobjLogin = new Login($vresultSet["id"], $this->roleSvc->getById($vresultSet["role_id"]),$this->candidateSvc->getById($vresultSet["candidate_id"]),$vresultSet["login_id"], $vresultSet["pwd"], $vresultSet["is_active"]);

        return $vobjLogin;
    }



    function __destruct()
    {
        DbConnection::closeConnection($this->dbConn);
    }
}
?>
