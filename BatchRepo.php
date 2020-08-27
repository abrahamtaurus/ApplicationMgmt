/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once 'Batch.php';
include_once  "../core/dBConnection.php";
class BatchRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjBatch){
		$vobjBatch = $pobjBatch;
		$strSQLStmt = "INSERT INTO tbl_batch(course_id, year_2, is_open,is_deleted) VALUES(?,?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1, $pobjBatch->getyear(),$pobjBatch->getisOpen(),0]);
        $vobjBatch->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjBatch;
    }
    
    public function update($pobjBatch){
        $strSQLStmt="UPDATE tbl_batch SET year_2=?, is_open=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjBatch->getyear(),$pobjBatch->getisOpen(), $pobjBatch->getId()]);
        //$stmt->close();
        return $pobjBatch;
    }

    public function delete($pobjBatch){
        $strSQLStart="UPDATE tbl_batch SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjBatch->getId()]);
       // $stmt->close();

        return $pobjBatch;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>

