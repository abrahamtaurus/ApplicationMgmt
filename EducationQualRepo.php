<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 25/08/2020
**/
include_once 'EducationQual.php';
include_once  "../core/dBConnection.php";
class EducationQualRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjEducationQual){
		$vobjEducationQual = $pobjEducationQual;
		$strSQLStmt = "INSERT INTO tbl_education_qual(degree_id, candidate_id, degree, university, degree_yr, subject, class, percentage, is_deleted) VALUES(?,?,?,?,?,?,?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1,0,$pobjEducationQual->getdegree(),$pobjEducationQual->getUniversity(),$pobjEducationQual->getyear(), $pobjEducationQual->getsubject(), $pobjEducationQual->getclass(), $pobjEducationQual->getpercentage(), 0]);
        $vobjEducationQual->setid($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjEducationQual;
    }
    
    public function update($pobjEducationQual){
        $strSQLStmt="UPDATE tbl_education_qual SET degree=?, university=?,degree_yr=?, subject=?, class=?,percentage=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjEducationQual->getdegree(),$pobjEducationQual->getUniversity(),$pobjEducationQual->getyear(), $pobjEducationQual->getsubject(), $pobjEducationQual->getclass(), $pobjEducationQual->getpercentage(), $pobjEducationQual->getid()]);
        //$stmt->close();
        return $pobjEducationQual;
    }

    public function delete($pobjEducationQual){
        $strSQLStmt="UPDATE tbl_education_qual SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjEducationQual->getid()]);
       // $stmt->close();

        return $pobjEducationQual;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>