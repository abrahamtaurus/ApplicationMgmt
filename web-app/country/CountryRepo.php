/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
include_once 'Country.php';
include_once  "../core/DbConnection.php";
class CountryRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = DbConnection::getConnection();
    }
    public function insert($pobjCountry){
		$vobjCountry = $pobjCountry;
		$strSQLStmt = "INSERT INTO tbl_country(name, host, is_deleted) VALUES(?,?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([$pobjCountry->getname(),$pobjCountry->gethost(),0]);
        $vobjCountry->setId($this->dbCon->lastInsertId());
        //$stmt->close();
		return $vobjCountry;
    }
    
    public function update($pobjCountry){
        $strSQLStmt="UPDATE tbl_country SET name=?, host=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCountry->getname(),$pobjCountry->gethost(),$pobjCountry->getId()]);
        //$stmt->close();
        return $pobjCountry;
    }

    public function delete($pobjCountry){
        $strSQLStmt="UPDATE tbl_country SET is_deleted=1 WHERE id=?"; 
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCountry->getId()]);
       // $stmt->close();

        return $pobjCountry;
    }

    function __destruct() 
    {
        //DbConnection::closeConnection($this->dbCon);
    }  
} 
?>
