<?php
include "batch.php";

Class batchrepo
{
    private $dbConn;
        
    function __construct()
    {
        $this->dbConn = DbConnection::getConnection();
    }
    public function insert($pobjbatch)
    {
        $SQLStmt = "INSERT INTO batch(course_id,year_2, is_open ) VALUES (?,?, ?)";
        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjbatch->getcourse_id(),$pobjbatch->getyear_2(),$pobjbatch->getis_open());
        $stmt->execute();
        $stmt->close();
    }
    function __destruct()
    {
        DbConnection::closeConnection($this->dbCon);
    }   
}
    
?>