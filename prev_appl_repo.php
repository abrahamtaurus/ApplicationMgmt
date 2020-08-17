<?php
// Repoclass prev_appl
include 'prev_appl.php';
include_once "dbConnection.php";
class repo1
{
	 private $dbCon; 
	 function __construct()
	 {
	 $this->dbCon = DbConnection::getConnection(); 
	 }
	 public function insert($pobjprev_appl) 
	 {
		 $strSQLStart =("INSERT INTO tbl_prev_appl(candidate_id, application_no,appl_batch) VALUES (?, ?, ?)"); 
		 $stmt = $conn->prepare($strSQLStart); 
		 $stmt->bindParam($pobjprev_appl->getcandidate_id(),$pobjprev_appl->getapplication_no(),$pobjprev_appl->getappl_batch()); 
		 $stmt->execute();
		 $stmt->close(); 
	 }
	 function __destruct() 
	 {
	 DbConnection::closeConnection($this->dbCon); 
	 }
 }
 ?>