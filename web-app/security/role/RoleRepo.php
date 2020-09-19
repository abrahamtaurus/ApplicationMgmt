<?php
include_once 'Role.php';
include_once  "../../core/DbConnection.php";

class RoleRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = DbConnection::getConnection();
    }
    public function insert($pobjRole){
		$vobjRole = $pobjRole;
		$strSQLStmt = "INSERT INTO tbl_role(role_name, is_deleted) VALUES(?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([$pobjRole->getrolename(),0]);
        $vobjRole->setId($this->dbCon->lastInsertedId());
        //$stmt->close();
		return $vobjRole;
    }

    public function update($pobjRole){
        $strSQLStmt="UPDATE tbl_role SET role_name=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjRole->getrolename(), $pobjRole->getId()]);
        //$stmt->close();
        return $pobjRole;
    }

    public function delete($pobjRole){
        $strSQLStart="UPDATE tbl_role SET is_deleted=1 WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjRole->getId()]);
       // $stmt->close();

        return $pobjRole;
    }

    public function getById($roleId){
        $strSQLStmt="SELECT * FROM tbl_role WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$roleId]);
        $vresultSet = $stmt->fetch(PDO::FETCH_ASSOC);                // Gets all the table rows as an associative array

       // Create the login object store in an array as JSON
       if($vresultSet)
           $vobjRole = new Role($vresultSet["id"], $vresultSet["role_name"]);

        return $vobjRole;
    }

    function __destruct()
    {
        //DbConnection::closeConnection($this->dbCon);
    }
}
?>
