<?php
include_once "Category.php";
include_once "CategoryRepo.php";

    class CategorySvc{
        private $categoryRepo;
        
        function __construct(){
            $this->categoryRepo = new CategoryRepo();
        }

        public function save($pobjCategory){
            if($pobjCategory->getId()==-1)
                $this->insert($pobjCategory);
        }

    }
?>