<?php
include_once "Candidate.php";
include_once "CandidateRepo.php";
class CandidateSvc{

	private $objCandidateRepo;

	public function __construct(){
		$this->objCandidateRepo = new CandidateRepo();
	}

	public function save($pobjCandidate){
		$vobjCandidate = $pobjCandidate;
    if($pobjCandidate->getId()==-1)
			$vobjCandidate = $this->objCandidateRepo->insert($pobjCandidate);
		else
			$this->objCandidateRepo->update($pobjCandidate);

		return $vobjCandidate;
	  }

	public function getAll(){
        return $this->objCandidateRepo->getAll();
	}

    /*
    *   Returns an object of the Candidate
    */
    public function getById($pid)
    {
        return $this->objCandidateRepo->getById($pid);
    }

    /*
    *   Returns an array of the Candidate as JSON Objects
    */
	public function getAllAsJSON()
	{

        $vcandidateList =  $this->getAll();
        $noCandidates = count($vcandidateList);
        for($ctr=0; $ctr<$noCandidates; $ctr++){
            $vcandidateList[$ctr] = $vcandidateList[$ctr]->toJSON();
        }
        return $vcandidateList;
    }

    /*
    *   Returns an object of the Candidate as an JSON object
    */
    public function getByIdAsJSON($pid){
        return $this->getById($pid)->toJSON();
    }


	  public function delete($pobjCandidate){
		$this->candidateRepo->delete($pobjCandidate);
	  }

}

?>
