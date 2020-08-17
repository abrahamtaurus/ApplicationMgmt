<?php
include_once "degree.php";
#include_once "degree_svc.php";

class degree_ctl
{
    private $vobjdegree_svc;
    public function __construct()
    {
        //$this->vobjDegSvc = new DegreeSvc();        
    }
    public function doPost()
    {
       // $vjsonDegree = json_decode($_POST['degData']);
        $vjsondegree = json_decode(file_get_contents('php://input'));
        $vobjdegree = new Degree($vjsondegree->id, $vjsondegree->name);
        echo $vobjdegree->toJSON();
    }    
    //$this->vobjDegSvc->save($vjsonDegree);  
}
$degree = new degree_ctl();
$degree->doPost();                                                    
?>