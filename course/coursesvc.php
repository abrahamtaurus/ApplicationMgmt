<?php
include_once 'CourseRepo.php';

class CourseSvc
{
    private $objCourseRepo;
    
	public function __construct() {
        $this->objCourseRepo = new CourseRepo();
    }
    
	public function save($pobjcourse) {
		if($pobjcourse->getid()==-1){
			$this->objCourseRepo->insert($pobjcourse);
		}
    }
    
    public function getById($pid){
        return $this->objCourseRepo->getById($pid);
    }
}

?>