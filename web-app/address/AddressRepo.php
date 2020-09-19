<?php
include_once "Address.php";
include_once "/web-app/core/DbConnection.php";

    class AddressRepo{
        private $dbConn;

        function __construct(){
            $this->dbConn = DbConnection::getConnection();
        }

        public function insert($pobjCandidate){
            $strSQLStart = ("INSERT INTO correspondanceAddr(id,candidate_id,addr_line1,addr_line2,locality,pincode,state, address_type) Values (?,?,?,?,?,?,?)");
            $strSQLStart = ("INSERT INTO perminantAddr(id,candidate_id,addr_line1,addr_line2,locality,pincode,state, address_type) Values (?,?,?,?,?,?,?)");
            $stmt = $conn->prepare( $strSQLStart);
            $stmt->bindParam($pobjAddress->id(),$pobjAddress->candidate_id(),$pobjAddress->addr_line1(),$pobjAddress->addr_line2(),$pobjAddress->locality(),$pobjAddress->city(),$pobjAddress->pincode(),$pobjAddress->state,$pobjAddress->address_type());

            $stmt->execute();
        $stmt->close();

        }

        function __destruct()
    {
        DbConnection::closeConnection($this->dbCon);
    }

    }
?>
