/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
include_once "Country.php";
include_once "CountrySvc.php";

class CountryCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new CountrySvc();        
    }
    public function doPost()
    {
       // $vjsonapplication = json_decode($_POST['applData']);
        $vjsoncountry = json_decode(file_get_contents('php://input'));
        
        $vobjCountry = new Country($vjsoncountry->id, $vjsoncountry->name, $vjsoncountry->host);
        $vobjCountry = $this->vobjApplSvc->save($vobjCountry);
        echo $vobjCountry->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonapplication);  
}
$appl = new CountryCtl();
$appl->doPost();                                                    
?>





