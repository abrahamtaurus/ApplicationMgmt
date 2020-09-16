/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
include_once 'Application.php';
include_once  "../core/dBConnection.php";
class ApplicationRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjApplication){
		$vobjApplication = $pobjApplication;
		$strSQLStmt = "INSERT INTO tbl_application(candidate_id, appl_no, submission_date, appl_status, batch_id, is_deleted) VALUES(?,?,?,?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1, $pobjApplication->getapplicationNo(),$pobjApplication->getsubmissionDate(),$pobjApplication->getstatus(), 1, 0]);
        $vobjApplication->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjApplication;
    }
    
    public function update($pobjApplication){
        $strSQLStmt="UPDATE tbl_application SET appl_no=?, submission_date=?, appl_status=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjApplication->getapplicationNo(),$pobjApplication->getsubmissionDate(),$pobjApplication->getstatus(), $pobjApplication->getId()]);
        //$stmt->close();
        return $pobjApplication;
    }

    public function delete($pobjApplication){
        $strSQLStart="UPDATE tbl_application SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjApplication->getId()]);
       // $stmt->close();

        return $pobjApplication;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>