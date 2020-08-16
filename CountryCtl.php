<?php
include_once "Country.php";
#include_once "CountrySvc.php";

class CountryCtl
{
    private $vobjApplSvc;
    public function __construct()
    {
        //$this->vobjApplSvc = new ApplicationSvc();        
    }
    public function doPost()
    {
       // $vjsonApplication = json_decode($_POST['applData']);
        $vjsoncountry = json_decode(file_get_contents('php://input'));
        
        $vobjcountry = new Country($vjsoncountry->id, $vjsoncountry->country_name, $vjsoncountry->host);
        
        echo $vobjcountry->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonApplication);  
}
$appl = new CountryCtl();
$appl->doPost();                                                    
?>






