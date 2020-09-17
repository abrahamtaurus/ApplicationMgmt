<?php
include_once "education_qual.php";
#include_once "education_qual_svc.php";

class education_qual_ctl
{
    private $vobjedusvc;
    public function __construct()
    {
            
    }
    public function doPost()
    {
       
        $vjsoneducation_qual = json_decode(file_get_contents('php://input'));
        #var_dump($vjsoneducation_qual,true);
        $vobjeducation_qual = new education_qual($vjsoneducation_qual->id, $vjsoneducation_qual->degree_id, $vjsoneducation_qual->candidate_id, $vjsoneducation_qual->name, $vjsoneducation_qual->degree,$vjsoneducation_qual->university,$vjsoneducation_qual->degree_yr,
										$vjsoneducation_qual->subject,$vjsoneducation_qual->class1,$vjsoneducation_qual->percentage);
        
        echo $vobjeducation_qual->toJSON();
    
    }    
    
}
$edu = new education_qual_ctl();
$edu->doPost();                                                    
?>
