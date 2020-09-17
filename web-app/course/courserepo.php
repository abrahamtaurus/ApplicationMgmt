<?php
include 'course.php';

class courserepo
{
    private $dbCon;
	public function __construct()
	{
        $this->dbCon = DbConnection::getConnection();
    }
	public function insert($pobjcourse) 
	{
        $strSQLStmt = ("INSERT INTO course(course_name, is_active ) VALUES (? ,?)");
        
        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjcourse->getcourse_name(),$pobjcourse->getis_active());
        
        $stmt->execute();
        $stmt->close();
    }
    
	function __destruct()
	{
        DbConnection::closeConnection($this->dbCon);
    }   
}

?>