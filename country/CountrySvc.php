/**
* Author:Hima Gopal
* Purpose:
* Date:23/08/2020
*/
<?php
include_once "Country.php";
include_once "CountryRepo.php";
class CountrySvc
{
	private $countryRepo;
	public function __construct()
    {
		$this->countryRepo = new CountryRepo();
	}
	public function save($pobjCountry){
		$vobjCountry = $pobjCountry;
        if($pobjCountry->getId()==-1)
        {
			$vobjCountry = $this->countryRepo->insert($pobjCountry);
		}
		else
		{
			$vobjCountry = $this->countryRepo->update($pobjCountry);
		}	  
		return $vobjCountry;
	  }
	  
	  
	  public function delete($pobjCountry){
		$this->countryRepo->delete($pobjCountry);
	  }
	  
}

?> 
