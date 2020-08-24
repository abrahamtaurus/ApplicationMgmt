<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 24/08/2020
**/
include_once "Degree.php";
include_once "DegreeRepo.php";
class DegreeSvc
{
	private $degreeRepo;
	public function __construct()
    {
		$this->degreeRepo = new DegreeRepo();
	}
	public function save($pobjDegree){
		$vobjDegree = $pobjDegree;
        if($pobjDegree->getId()==-1)
        {
			$vobjDegree = $this->degreeRepo->insert($pobjDegree);
		}
		else
		{
			$vobjDegree = $this->degreeRepo->update($pobjDegree);
		}	  
		return $vobjDegree;
	  }
	  
	  
	  public function delete($pobjDegree){
		$this->degreeRepo->delete($pobjDegree);
	  }
	  
}

?> 
