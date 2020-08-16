<?php
include 'dbConnection.php';
class Country {
  private $id;
  private $country_name;
  private $host;

  public function __construct($pid, $pcountryName, $phost)
  {
	$this->id = $pid;
	$this->country_name = $pcountryName;
	$this->host = $phost;
  }
  
  public function setid($pid)
  {
	$this->id = $pid;
  }
  
 public function setcountry_name($pcountryName)
  {
	$this->country_name = $pcountryName;
  }
  
  
  public function sethost($phost)
  {
	$this->host = $phost;
  }
 
  public function toJSON()
  {
        return json_encode("{id: $this->id, country_name:$this->country_name, host: $this->host}");
  }
}
?>
