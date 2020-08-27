/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
include_once "Course.php";
include_once "CourseSvc.php";

class CourseCtl
{
    private $vobjApplSvc;
    private $applData;
    public function __construct()
    {
        $this->vobjApplSvc = new CourseSvc();        
    }
    public function doPost()
    {
       // $vjsonCourse = json_decode($_POST['applData']);
        $vjsoncourse = json_decode(file_get_contents('php://input'));
        
        $vobjCourse = new Course($vjsoncourse->id, $vjsoncourse->course_name, $vjsoncourse->is_active);
        $vobjCourse = $this->vobjApplSvc->save($vobjCourse);
        echo $vobjCourse->toJSON();
    
    }    
    //$this->vobjApplSvc->save($vjsonCourse);  
}
$appl = new CourseCtl();
$appl->doPost();                                                    
?>
