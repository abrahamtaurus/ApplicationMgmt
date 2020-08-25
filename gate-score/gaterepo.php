<?php
include 'gate.php';

class gaterepo
{
    private $dbCon;
	public function __construct()
	{
        $this->dbCon = DbConnection::getConnection();
    }
	public function insert($pobjgate) 
	{
        $strSQLStmt = ("INSERT INTO gate(examDate, discipline, score, percentile, air,validity ) VALUES (? ,? ,? ,?, ?, ?)");
        
        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjbatch->getexamDate(),$pobjbatch->getdiscipline(),$pobjbatch->getscore(),$pobjbatch->getpercentile(),$pobjbatch->getair(),$pobjbatch->getvalidity());
        
        $stmt->execute();
        $stmt->close();
    }
    
	function __destruct()
	{
        DbConnection::closeConnection($this->dbCon);
    }   
}

?>