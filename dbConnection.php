<?php
//Database connection
class dbConnection
{
  
 private function __construct()
 {
	 
 }
 public static function getConnection()
 {
 $conn=null; 
 try 
 { 
 $conn = new PDO("mysql:host=localhost;dbname=gate", root, ''); 
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
 