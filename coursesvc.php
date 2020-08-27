/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Course.php";
include_once "CourseRepo.php";
class CourseSvc
{
	private $courseRepo;
	public function __construct()
    {
		$this->courseRepo = new CourseRepo();
	}
	public function save($pobjCourse){
		$vobjCourse = $pobjCourse;
        if($pobjCourse->getId()==-1)
        {
			$vobjCourse = $this->courseRepo->insert($pobjCourse);
		}
		else
		{
			$vobjCourse = $this->courseRepo->update($pobjCourse);
		}	  
		return $vobjCourse;
	  }
	  
	  
	  public function delete($pobjCourse){
		$this->courseRepo->delete($pobjCourse);
	  }
	  
}

?> 
