<?php
//Database connection
class DBConnection{
    private static $con;
    
    private function __construct(){}
    
    public static function getConnection(){
        $con=null;
        
         try { 
             DBConnection::$con = new PDO("mysql:host=localhost;dbname=chg_appl_db", 'root', ''); 
              
             DBConnection::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);         // set the PDO error mode to exception
         }catch(PDOException $e) {
            echo "Error: " . $e->getMessage(); 
         }
        
         return DBConnection::$con; 
    }
    
    public static function closeConnection($pconn){
        $pconn = null; 
    }
 }
 ?>
 