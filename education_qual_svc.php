<?php
//educationsvc
include_once "education_qual.php";
include_once "education_qual_repo.php";
class education_qual_svc
{
	 private $education_qual_repo; 
	 public function __construct()
	 {
	 $this->education_qual_repo = new education_qual_repo(); 
	 }
	 public function save($pobjeducation_qual)
	 {
	 if($pobjeducation_qual->getId()==-1)
	 {
	 $this->insert($pobjeducation_qual);
	 }
	}
}
 ?>