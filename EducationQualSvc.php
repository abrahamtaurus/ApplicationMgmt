<?php
/**
*Author : Anusha DSouza
*Purpose : 
*Date : 25/08/2020
**/
include_once "EducationQual.php";
include_once "EducationQualRepo.php";
class EducationQualSvc
{
	private $educationqualRepo;
	public function __construct()
    {
		$this->educationqualRepo = new EducationQualRepo();
	}
	public function save($pobjEducationQual){
		$vobjEducationQual = $pobjEducationQual;
        if($pobjEducationQual->getid()== -1)
        {
			$vobjEducationQual = $this->educationqualRepo->insert($pobjEducationQual);
		}
		else
		{
			$vobjEducationQual = $this->educationqualRepo->update($pobjEducationQual);
		}	  
		return $vobjEducationQual;
	  }
	  
	  
	  public function delete($pobjEducationQual){
		$this->educationqualRepo->delete($pobjEducationQual);
	  }
	  
}

?> 