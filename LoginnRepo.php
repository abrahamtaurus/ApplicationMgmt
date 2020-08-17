<?php
include_once "Loginn.php"; 
include_once "Loginn.php";

class LoginnRepo
{
	private $dbConn;
	 function __construct()
    {
		$this->dbConn = DbConnection::getConnection();
	}
	public function insert($pobjLoginn) 
    {   
        $strSQLStart=("INSERT INTO Loginn(login_id,password,isActive,role) Values (?,?,?,?)");
		$stmt = $conn->prepare( $strSQLStart);
				
				$stmt->bindParam($pobjLoginn->getlogin_id(),$pobjLoginn->getpassword(),$pobjLoginn->getisActive(),$pobjLoginn->getrole());
        $stmt->execute();
        $stmt->close();
	}
    function __destruct()
    {
        DbConnection::closeConnection($this->dbCon);
    }
}
?>


