<?php
include_once "Category.php";
include_once "CategoryRepo.php";
class CategorySvc
{
	private $categoryRepo;
	public function __construct()
    {
		$this->categoryRepo = new CategoryRepo();
	}
	public function save($pobjCategory){
		$vobjCategory = $pobjCategory;
        if($pobjCategory->getId()==-1)
        {
			$vobjCategory = $this->categoryRepo->insert($pobjCategory);
		}
		else
		{
			$vobjCategory = $this->categoryRepo->update($pobjCategory);
		}	  
		return $vobjCategory;
	  }
	  
	  
	  public function delete($pobjCategory){
		$this->categoryRepo->delete($pobjCategory);
	  }
	  
}

?> 
