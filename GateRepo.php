/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once 'Gate.php';
include_once  "../core/DbConnection.php";

class GateRepo
{
    private $dbCon;
	public function __construct()
	{
        $this->dbCon = DbConnection::getConnection();
    }
	public function insert($pobjGate) 
	{
        $vobjGate=$pobjGate;
        $strSQLStmt = "INSERT INTO tbl_gate_score(candidate_id,examDate, discipline, score, percentile, air,validity,is_deleted ) VALUES (? ,? ,? ,?, ?, ?,?,?)";
        
        $stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1,$pobjGate->getexamDate(),$pobjGate->getDiscipline(),$pobjGate->getscore(),$pobjGate->getpercentile(),$pobjGate->getAIR(),$pobjGate->getvalidity(),0]);
        
        $vobjGate->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjGate;
    }
    public function update($pobjGate){
        $strSQLStmt="UPDATE tbl_gate_score SET examDate=?, discipline=?, score=?,percentile=?,air=?,validity=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjGate->getexamDate(),$pobjGate->getDiscipline(),$pobjGate->getscore(), $pobjGate->getpercentile(),$pobjGate->getAIR(),$pobjGate->getvalidity(),$pobjGate->getId()]);
        //$stmt->close();
        return $pobjGate;
    }
    public function delete($pobjGate)
    {
        $strSQLStart="UPDATE tbl_gate_score SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjGate->getId()]);
       // $stmt->close();

        return $pobjGate;
    }
	function __destruct()
	{
        //DbConnection::closeConnection($this->dbCon);
    }   
}

?>
