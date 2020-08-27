<?php
include_once "../core/DBConnection.php"; 
include_once "Batch.php";
include_once "../course/CourseSvc.php";

Class BatchRepo {
    private $dbConn;
    private $courseSvc;
        
    function __construct() {
        $this->dbConn = DBConnection::getConnection();                  // Gets a connection to the database
        $this->courseSvc = new CourseSvc();
    }
    
    /**
    *  Inserts the new batch details into the database
    */
    public function insert($pobjBatch) {
        $vobjBatch = $pobjBatch;
        
        $SQLStmt = "INSERT INTO tbl_batch(year_2, is_open) VALUES (?, ?)";

        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjBatch->getyear_2(),$pobjBatch->getis_open());

        // Send the SQL Insert command to the database
        $stmt->execute();
        
        return $vobjBatch;
    }

    
    /**
    *  Updates the details of the batch in the database
    */
    public function update($pobjBatch) {
        $SQLStmt = "UPDATE tbl_batch SET year_2= ?, is_open=? WHERE id=?";

        $stmt = $conn->prepare($strSQLStmt);
        $stmt->bindParam($pobjBatch->getyear_2(), $pobjBatch->getis_open(), $pobjBatch->getcourse_id());

        $stmt->execute();                                              // Send the SQL Insert command to the database
        
        return $pobjBatch;
    }
    
    
    /**
    *  Selects the details of all the batches in the database
    */
    public function getAll() {
        $vbatchList = array();
        $vobjBatch;
        
        $strSQLStmt = "SELECT id, course_id, year_2, is_open FROM tbl_batch";
        
        $stmt = $this->dbConn->prepare($strSQLStmt);
                
        $stmt->execute();                                              // Send the SQL Insert command to the database
        
        $vresultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array
        
        // Create the batch object store in an array as JSON
        foreach($vresultSet as $row) {
            $vobjBatch = new Batch($row["id"], $this->courseSvc->getById($row["course_id"]), $row["year_2"], $row["is_open"]);
            
            array_push($vbatchList, $vobjBatch);
        }
        
        return $vbatchList;
    }
    
    /**
    *  Selects the details the batch whose id is passed from the database
    */
    public function getById($pid) {
        $vobjBatch;
        
        $strSQLStmt = "SELECT id, course_id, year_2, is_open FROM tbl_batch WHERE id=?";
        
        $stmt = $this->dbConn->prepare($strSQLStmt);
        
        $stmt->bindParam(1, $pid, PDO::PARAM_INT);
        
        $stmt->execute();                                              // Send the SQL Insert command to the database
        
        $vresultSet = $stmt->fetch(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array
        
        // Create the batch object store in an array as JSON
        if($vresultSet) 
            $vobjBatch = new Batch($vresultSet["id"], $this->courseSvc->getById($vresultSet["course_id"]), $vresultSet["year_2"], $vresultSet["is_open"]);
            
                
        return $vobjBatch;
    }
    
    
    /*
    * Closes the database connection
    */
    function __destruct() {
        DbConnection::closeConnection($this->dbConn);
    }   
}
    
?>