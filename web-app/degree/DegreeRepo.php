<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 24/08/2020
**/
include_once 'Degree.php';
include_once  "../core/dBConnection.php";
class DegreeRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjDegree){
		$vobjDegree = $pobjDegree;
		$strSQLStmt = "INSERT INTO tbl_degree(name, is_deleted) VALUES(?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([$pobjDegree->getname(), 0]);
        $vobjDegree->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjDegree;
    }
    
    public function update($pobjDegree){
        $strSQLStmt="UPDATE tbl_degree SET name=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjDegree->getname(),$pobjDegree->getId()]);
        //$stmt->close();
        return $pobjDegree;
    }

    public function delete($pobjDegree){
        $strSQLStart="UPDATE tbl_degree SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjDegree->getId()]);
       // $stmt->close();

        return $pobjDegree;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>
