<?php
include_once "Category.php";
include_once "DbConnection.php";

    class CategoryRepo{
        private $dbConn;
        
        function __construct(){
            $this->dbConn = DbConnection::getConnection();
        }

        public function insert($pobjCategory){
            $strSQLStart = ("INSERT INTO Category(name,shortName) Values (?,?)");
            $stmt = $conn->prepare( $strSQLStart);
            $stmt->bindParam($pobjCategory->getname(),$pobjCategory->getshortName());
            $stmt->execute();
        $stmt->close();
            
        }
         
        function __destruct()
    {
        DbConnection::closeConnection($this->dbCon);
    }

}
?>