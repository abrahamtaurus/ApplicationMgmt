
/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once 'Course.php';
include_once  "../core/dBConnection.php";
class CourseRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjCourse){
		$vobjCourse = $pobjCourse;
		$strSQLStmt = "INSERT INTO tbl_course (course_name, is_active,is_deleted) VALUES(?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([ $pobjCourse->getcourseName(),$pobjCourse->getisActive(),0]);
        $vobjCourse->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjCourse;
    }
    
    public function update($pobjCourse){
        $strSQLStmt="UPDATE tbl_course SET course_name=?, is_active=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCourse->getcourseName(),$pobjCourse->getisActive(), $pobjCourse->getId()]);
        //$stmt->close();
        return $pobjCourse;
    }

    public function delete($pobjCourse){
        $strSQLStart="UPDATE tbl_course SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCourse->getId()]);
       // $stmt->close();

        return $pobjCourse;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>




