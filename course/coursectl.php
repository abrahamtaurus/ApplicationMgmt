<?php
include_once "course.php";
#include_once "gatesvc.php";

class coursectl
{
    private $vobjApplSvc;
    function __construct()
    {
        //$this->vobjApplSvc = new CandidateSvc();        
    }
    public function doPost()
    {
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsoncourse = json_decode(file_get_contents('php://input'));
        var_dump($vjsoncourse);
        $vobjcourse = new course ($vjsoncourse->id, $vjsoncourse->course_name, $vjsoncourse->is_active);
        
        echo $vobjcourse->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCandidate);  
}
$appl = new coursectl();
$appl->doPost();                                                    
?>