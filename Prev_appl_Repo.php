/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once 'Prev_appl.php';
include_once  "../core/dBConnection.php";
class Prev_applRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = dbConnection::getConnection();
    }
    public function insert($pobjPrev_appl){
		$vobjPrev_appl = $pobjPrev_appl;
		$strSQLStmt = "INSERT INTO tbl_prev_appl(candidate_id, date_1, application_no,is_deleted) VALUES(?,?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1, $pobjPrev_appl->getdate(),$pobjPrev_appl->getapplicationNo(),0]);
        $vobjPrev_appl->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjPrev_appl;
    }
    
    public function update($pobjPrev_appl){
        $strSQLStmt="UPDATE tbl_prev_appl SET date_1=?, application_no=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjPrev_appl->getdate(),$pobjPrev_appl->getapplicationNo(), $pobjPrev_appl->getId()]);
        //$stmt->close();
        return $pobjPrev_appl;
    }

    public function delete($pobjPrev_appl){
        $strSQLStart="UPDATE tbl_prev_appl SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjPrev_appl->getId()]);
       // $stmt->close();

        return $pobjPrev_appl;
    }

    function __destruct() 
    {
        //dbConnection::closeConnection($this->dbCon);
    }  
} 
?>

