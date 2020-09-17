<?php
//Database connection
class dbConnection
{
  private $host="localhost";
  private $database="chg_appl_db";
  private $user="root";
  private $password="";

 private function __construct()
 {

 }
 public static function getConnection()
 {
 $conn=null;
 try
 {
 $conn = new PDO("mysql:host=$this->host;dbname=$this->databasegate", $this->user, $this->password);
 // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e)
 {
 echo "Error: " . $e->getMessage();
 }
 return conn;
 }
 public static function closeConnection($pconn)
 {
 $pconn->close();
 }
 }
 ?>
