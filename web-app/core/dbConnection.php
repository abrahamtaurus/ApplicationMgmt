<?php
//Database connection
class DbConnection
{
  private static $host="localhost";
  private static $database="chg_appl_db";
  private static $user="root";
  private static $password="";

 private function __construct(){}

 public static function getConnection(){
   $conn=null;
   try{
     $conn = new PDO("mysql:host=" . DbConnection::$host . "; dbname=" . DbConnection::$database, DbConnection::$user, DbConnection::$password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }
    return $conn;
  }
 public static function closeConnection($pconn){
   $pconn = null;
 }
 }
 ?>
