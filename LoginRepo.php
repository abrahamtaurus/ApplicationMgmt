<?php
include_once 'Login.php';
include_once  "../core/dBConnection.php";
class LoginRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjLogin){
		$vobjLogin = $pobjLogin;
		$strSQLStmt = "INSERT INTO tbl_login(candidate_id, role_id, login_id, pwd, is_active, is_deleted) VALUES(?,?,?,?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1, 1,$pobjLogin->getloginId(),$pobjLogin->getpassword(),$pobjLogin->isActive(), 0]);
        $vobjLogin->setId($this->dbCon->lastInsertedId());
        //$stmt->close();
		return $vobjlogin;
    }
    
    public function update($pobjLogin){
        $strSQLStmt="UPDATE tbl_login SET login_id=?, pwd=?, is_active=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjLogin->getloginId(),$pobjLogin->getpassword(),$pobjLogin->getisActive(), $pobjLogin->getId()]);
        //$stmt->close();
        return $pobjLogin;
    }

    public function delete($pobjLogin){
        $strSQLStart="UPDATE tbl_login SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjLogin->getId()]);
       // $stmt->close();

        return $pobjLogin;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>