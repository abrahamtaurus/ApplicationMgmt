<?php
include_once "Category.php";
//include_once "CategorySvc.php";

class CategoryCtl{
    private $vobjApplSvc;
    
    function __construct(){
        //$this->vobjApplSvc = new CategorySvc();        
    }
    
    public function doPost(){
       // $vjsonCategory = json_decode($_POST['applData']);
        $vjsonCategory = json_decode(file_get_contents('php://input'));
        
                
        $vobjCategory = new Category($vjsonCategory->id, $vjsonCategory->name, $vjsonCategory->shortName);
        
        echo $vobjCategory->toJSON();
        

        //$this->vobjApplSvc->save($vjsonCandidate);        
    }
    
}
                                       
$appl = new CategoryCtl();
$appl->doPost();                                                    
?>