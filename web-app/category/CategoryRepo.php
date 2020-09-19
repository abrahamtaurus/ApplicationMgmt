<?php
include_once 'Category.php';
include_once  $_SERVER['DOCUMENT_ROOT'] . "/web-app/core/DbConnection.php";
class CategoryRepo
{
    private $dbCon;
    public function __construct()
    {
        $this->dbCon = DbConnection::getConnection();
    }
    public function insert($pobjCategory){
		$vobjCategory = $pobjCategory;
		$strSQLStmt = "INSERT INTO tbl_category(name, is_deleted) VALUES(?,?)";
		$stmt = $this->dbCon->prepare( $strSQLStmt);
        $stmt->execute([$pobjCategory->getname(), 0]);
        $vobjCategory->setId($this->dbCon->lastInsertedId());
        //$stmt->close();
		return $vobjCategory;
    }

    public function update($pobjCategory){
        $strSQLStmt="UPDATE tbl_category SET name=? WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCategory->getname(), $pobjCategory->getId()]);
        //$stmt->close();
        return $pobjCategory;
    }

    public function delete($pobjCategory){
        $strSQLStart="UPDATE tbl_category SET is_deleted=1 WHERE id=?";
        $stmt = $this->dbCon->prepare($strSQLStmt);
        $stmt->execute([$pobjCategory->getId()]);
       // $stmt->close();

        return $pobjCategory;
    }

    function __destruct()
    {
        //DbConnection::closeConnection($this->dbCon);
    }
}
?>
