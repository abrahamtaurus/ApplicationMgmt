<?php
include_once "Role.php"; 
include_once "DbConnection.php";

class RoleRepo
{
	private $dbConn;
	 function __construct()
    {
		$this->dbConn = DbConnection::getConnection();
	}
	public function insert($pobjRole) 
    {   
        $strSQLStart=("INSERT INTO Role(name) Values (?)");
		$stmt = $conn->prepare( $strSQLStart);
				
				$stmt->bindParam($pobjRole->getname());
        $stmt->execute();
        $stmt->close();
	}
    function __destruct()
    {
        DbConnection::closeConnection($this->dbCon);
    }
}
?>


