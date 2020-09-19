<?php
include 'Experience.php';
class ExperienceRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = DbConnection::getConnection();
    }
    public function insert($pobjexperience) 
    {
        $strSQLStmt = "INSERT INTO Experience(emp_name,emp_address,fromDt,toDate,nature_work) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjexperience->emp_name(),$pobjexperience->emp_address(),$pobjexperience->fromDt(),$pobjexperience->toDate(),$pobjexperience->nature_work());
        $stmt->execute();
        $stmt->close();
    }
    function __destruct() 
    {
        DbConnection::closeConnection($this->dbCon);
    }  
} 
?>
