<?php
include_once "Candidate.php";
include_once "Address.php";

class AddressCtl{
    private $vobjApplSvc;
    
    function __construct(){
        //$this->vobjApplSvc = new AddressSvc();        
    }
    
    // New Candidate
    public function doPost(){
        
        // Get JSON as a stream of characters from HTTP port
        $vjsonAddress = json_decode(file_get_contents('php://input'));
        
        //Correspondance Address
        $vobjAddress = new Address($vjsonAddress->id, $vjsonAddress->candidate_id, $vjsonAddress->addr_line1, $vjsonAddress->addr_line2, $vjsonAddress->locality, $vjsonAddress->city, $vjsonAddress->pincode, $vjsonAddress->state, $vjsonAddress->address_type);
         
        echo $vobjAddress->toJSON();
        
    
        //$this->vobjApplSvc->save($vjsonCandidate);        
    }
    
}
                                       
$appl = new AddressCtl();
$appl->doPost();                                                    
?>