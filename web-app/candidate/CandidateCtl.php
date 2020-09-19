<?php
include_once "Candidate.php";
include_once "CandidateSvc.php";
class CandidateCtl
{
    private $objCandidateSvc;
    //private $applData;
    public function __construct()
    {
        $this->objCandidateSvc = new CandidateSvc();        
    }
    public function doPost()
    {
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsonCandidate = json_decode(file_get_contents('php://input'));
        
        $vobjCandidate = new Candidate($vjsonCandidate->id,$vjsonCandidate->category, $vjsonCandidate->firstName, $vjsonCandidate->lastName, $vjsonCandidate->dob,$vjsonCandidate->gender,$vjsonCandidate->addrCorrespondance,$vjsonCandidate->addrPerminant,$vjsonCandidate->nationality,$vjsonCandidate->categoryy,$vjsonCandidate->email,$vjsonCandidate->phone,$vjsonCandidate->photo);
        $vobjCandidate = $this->vobjCandidateSvc->save($vobjCandidate);
       // echo $vobjCandidate->toJSON();
        echo $this->$objCandidateSvc->save($vobjCandidate);    
    
    
    }    
    //$this->vobjApplSvc->save($vjsonCandidate);  
    public function doGet(){
        $vobjCandidate;
        
        if(count($_GET)>0)
            $vobjCandidate = $this->objCandidateSvc->getById($_GET['id']);
        else
            $vjsonCandidate = $this->objCandidateSvc->getAllAsJSON();
         echo json_encode($vjsonCandidate);
        //echo $vobjCandidate->toJSON();
    }    
}
$appl = new CandidateCtl();
 if($_SERVER['REQUEST_METHOD'] === 'POST') 
     $appl->doPost();
else
     $appl->doGet();                                                  
?>

