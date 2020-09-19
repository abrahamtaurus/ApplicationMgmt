
<?php
include_once 'Candidate.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/web-app/core/DbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/web-app/category/CategorySvc.php";

class CandidateRepo {
    private $dbCon;
    private $categorySvc;

    public function __construct(){
        $this->dbCon = DbConnection::getConnection();

        $this->categorySvc = new CategorySvc();
    }

    public function insert($pobjCandidate){
		$vobjCandidate = $pobjCandidate;
		$strSQLStmt = "INSERT INTO tbl_candidate(category_id, first_name, last_name, dob, gender,addr_line_1,addr_line_2, nationality,category,email,phone,photo,is_deleted) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([1, $pobjCandidate->getfirstName(),$pobjCandidate->getlastName(),$pobjCandidate->getdob(),$pobjCandidate->gender(),$pobjCandidate->getaddrCorrespondance(),$pobjCandidate->getaddrPerminant(),$pobjCandidate->getnationality(),$pobjCandidate->getcategoryy(),$pobjCandidate->getemail(),$pobjCandidate->getphone(),$pobjCandidate->getphoto(),0]);
        $vobjApplication->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjCandidate;
    }

    public function update($pobjCandidate){
        $strSQLStmt="UPDATE tbl_candidate SET first_name=?, last_name=?, dob=?, gender=?, addr_line_1=?, addr_line_2=?, nationality=?, category=?, email=?, phone=? ,photo=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCandidate->getfirstName(),$pobjCandidate->getlastName(),$pobjCandidate->getdob(), $pobjCandidate->getgender(),$pobjCandidate->getaddrCorrespondance(),$pobjCandidate->getaddrPerminant(),$pobjCandidate->getnationality(),$pobjCandidate->getcategoryy(),$pobjCandidate->getemail(),$pobjCandidate->getphone(),$pobjCandidate->getphoto(),$pobjCandidate->getId()]);
        //$stmt->close();
        return $pobjCandidate;
    }

    public function delete($pobjCandidate){
        $strSQLStart="UPDATE tbl_candidate SET is_deleted=1 WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCandidate->getId()]);
       // $stmt->close();

        return $pobjCandidate;
    }

    public function getAll() {
        $vcandidateList = array();
        $vobjCandidate;

        $strSQLStmt = "SELECT id,category_id first_name,last_name,dob,gender,nationality,category,email,phone FROM tbl_candidate ";

        $stmt = $this->dbCon->prepare($strSQLStmt);

        $stmt->execute();                                              // Send the SQL Insert command to the database

        $vresultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array

        // Create the batch object store in an array as JSON
        foreach($vresultSet as $row) {
            $vobjCandidate = new Candidate($row["id"], $this->candidateSvc->getById($row["first_name"],$row["last_name"],$row["dob"],$row["gender"],$row["nationality"],$row["category"],$row["email"],$row["phone"]));

            array_push($vcandidateList, $vobjCandidate);
        }
        return $vcandidateList;
    }

    public function getById($pid) {
        $vobjCandidate=null;

        $strSQLStmt = "SELECT id, first_name, last_name,dob, gender,nationality,category,email,phone FROM tbl_candidate WHERE id=?";

        $stmt = $this->dbCon->prepare($strSQLStmt);

        $stmt->bindParam(1, $pid, PDO::PARAM_INT);

        $stmt->execute();                                              // Send the SQL Insert command to the database

        $vresultSet = $stmt->fetch(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array

        // Create the batch object store in an array as JSON
        if($vresultSet)
            $vobjCandidate = new Candidate($vresultSet["id"], $vresultSet["first_name"],$row["last_name"],$vresultSet["dob"],$vresultSet["gender"],$vresultSet["nationality"],$vresultSet["category"],$vresultSet["email"],$vresultSet["phone"]);

        return $vobjCandidate;
    }


    function __destruct()
    {
        DbConnection::closeConnection($this->dbCon);
    }
}
?>
