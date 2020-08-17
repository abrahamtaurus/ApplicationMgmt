<?php
include_once "degree.php";
class degree_svc
{
	private $degree_repo;
	public function __construct()
    {
		$this->degree_repo = new degree_repo();
	}
	public function save($pobjdegree){
		if($pobjdegree->getId()==-1)
        {
			$this->insert($pobjdegree);
	     }
      }
}

?>