<?php
include_once "../core/DBConnection.php"; 
include_once 'Course.php';

class CourseRepo
{
    private $dbConn;
    
	public function __construct(){
        $this->dbConn = DbConnection::getConnection();
    }
    
	public function insert($pobjcourse) {
        $strSQLStmt = ("INSERT INTO course(course_name, is_active ) VALUES (? ,?)");
        
        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjcourse->getcourse_name(),$pobjcourse->getis_active());
        
        $stmt->execute();
        $stmt->close();
    }
    
    /**
    *  Selects the details the batch whose id is passed from the database
    */
    public function getById($pid) {
        $vobjCourse;
        
        $strSQLStmt = "SELECT id, course_name, is_active FROM tbl_course WHERE id=?";
                
        $stmt = $this->dbConn->prepare($strSQLStmt);
        
        $stmt->bindParam(1, $pid, PDO::PARAM_INT);
        
        $stmt->execute();                                              // Send the SQL Insert command to the database
        
        $vresultSet = $stmt->fetch(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array
        
        // Create the batch object store in an array as JSON
        if($vresultSet) 
            $vobjCourse = new Course($vresultSet["id"], $vresultSet["course_name"], $vresultSet["is_active"]);
            
                
        return $vobjCourse;
    }    
    
	function __destruct(){
        DbConnection::closeConnection($this->dbConn);
    }   
}

?>