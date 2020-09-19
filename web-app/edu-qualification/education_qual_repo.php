<?php
// Repoclass education
include 'education_qual.php';
include_once "DbConnection.php";
class education_qual_repo
{
	 private $dbCon; 
	 function __construct()
	 {
	 $this->dbCon = DbConnection::getConnection(); 
	 }
	 public function insert($pobjeducation_qual) 
	 {
		 $strSQLStart =("INSERT INTO tbl_education(degree_id, candidate_id, name, degree, university, degree_yr, subject, class1, percentage) VALUES (?, ?, ?, ?, ?, ?,?,?,?)"); 
		 $stmt = $conn->prepare($strSQLStart); 
		 $stmt->bindParam($pobjeducation_qual->getdegree_id(),$pobjeducation_qual->getcandidate_id(),$pobjeducation_qual->getname(),$pobjeducation_qual->getdegree(),$pobjeducation_qual->getuniversity(),$pobjeducation_qual->getdegree_yr(), $pobjeducation_qual->getsubject(), $pobjeducation_qual->getclass(), $pobjeducation_qual->getpercentage()); 
		 $stmt->execute();
		 $stmt->close(); 
	 }
	 function __destruct() 
	 {
	 DbConnection::closeConnection($this->dbCon); 
	 }
 }
 ?>