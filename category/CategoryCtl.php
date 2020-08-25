<?php
include_once "Category.php";
include_once "CategorySvc.php";

class CategoryCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new CategorySvc();        
    }
    public function doPost()
    {
       // $vjsoncategory = json_decode($_POST['applData']);
        $vjsoncategory = json_decode(file_get_contents('php://input'));
        
        $vobjCategory = new Category($vjsoncategory->id, $vjsoncategory->name);
        $vobjCategory = $this->vobjApplSvc->save($vobjCategory);
        echo $vobjCategory->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCategory);  
}
$appl = new CategoryCtl();
$appl->doPost();                                                    
?>



