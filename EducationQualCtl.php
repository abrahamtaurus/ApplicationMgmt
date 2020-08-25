<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 25/08/2020
**/
include_once "EducationQual.php";
include_once "EducationQualSvc.php";

class EducationQualCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new EducationQualSvc();        
    }
    public function doPost()
    {
       // $vjsonapplication = json_decode($_POST['applData']);
        $vjsoneducationqual = json_decode(file_get_contents('php://input'));
        
        $vobjEducationQual = new EducationQual($vjsoneducationqual->id,$vjsoneducationqual->degree, $vjsoneducationqual->university, $vjsoneducationqual->degree_yr,$vjsoneducationqual ->subject, $vjsoneducationqual ->class, $vjsoneducationqual ->percentage );
        $vobjEducationQual  = $this->vobjApplSvc->save($vobjEducationQual);
        echo $vobjEducationQual->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonapplication);  
}
$appl = new EducationQualCtl();
$appl->doPost();                                                    
?>