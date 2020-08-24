<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 24/08/2020
**/
include_once "Degree.php";
include_once "DegreeSvc.php";

class DegreeCtl
{
    private $vobjDegSvc;
	private $degData;
    public function __construct()
    {
        $this->vobjDegSvc = new DegreeSvc();        
    }
    public function doPost()
    {
       // $vjsonDegree = json_decode($_POST['degData']);
        $vjsondegree = json_decode(file_get_contents('php://input'));
        $vobjDegree = new Degree($vjsondegree->id, $vjsondegree->name);
		$vobjdegree = $this->vobjDegSvc->save($vobjDegree);
        echo $vobjDegree->toJSON();
    }    
    //$this->vobjDegSvc->save($vjsonDegree);  
}
$deg = new DegreeCtl();
$deg->doPost();                                                    
?>
