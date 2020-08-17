<?php
//prev_appl_svc
include_once "prev_appl.php";
//include_once "prev_appl_repo.php";
class prev_appl_svc
{
	 private $prev_appl_repo; 
	 public function __construct()
	 {
	 $this->prev_appl_repo = new prev_appl_repo(); 
	 }
	 public function save($pobjprev_appl)
	 {
	 if($pobjprev_appl->getId()==-1)
	 {
	 $this->insert($pobjprev_appl);
	 }
	}
}
 ?>