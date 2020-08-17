<?php
//degree_repo
include 'degree.php';
#include_once "dbConnection.php";
class degree_repo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjdegree) 
    {
        $strSQLStmt = "INSERT INTO degree(id,name) VALUES (?, ?)";
        
        $stmt = $conn->prepare($strSQLStart);
        $stmt->bindParam($pobjdegree->getid(),$pobjdegree->getname());
        
        $stmt->execute();
        $stmt->close();
    }
    function __destruct() 
    {
        dbConnection::closeConnection($this->dbCon);
    }  
} 
?>