<?php
include_once "Country.php";
class CountrySvc
{
	private $CountryRepo;
	public function __construct()
    {
		$this->CountryRepo = new CountryRepo();
	}
	public function save($pobjcountry){
		if($pobjcountry->getId()==-1)
        {
			$this->insert($pobjcountry);
	     }
      }
}
?> 