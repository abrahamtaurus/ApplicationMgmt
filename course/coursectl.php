<?php

include_once "Course.php";
include_once "CourseSvc.php";

class CourseCtl {
    
    private $objCourseSvc;
    
    function __construct(){
        $this->objCourseSvc = new CourseSvc();        
    }
    
    public function doPost(){
       // $vjsonCandidate = json_decode($_POST['applData']);
        $vjsoncourse = json_decode(file_get_contents('php://input'));
        var_dump($vjsoncourse);
        $vobjcourse = new course ($vjsoncourse->id, $vjsoncourse->course_name, $vjsoncourse->is_active);
        
        echo $vobjcourse->toJSON();
    
    }    
    
    /*
    *   Serve the HTTP GET requests 
    *   Request to return detials of single or multiple Courses   
    */
    public function doGet(){
        $vobjCourse;
        
        if(count($_GET)>0)
            $vobjCourse = $this->objCourseSvc->getById($_GET['id']);
        else
            $vobjCourse = $this->objCourseSvc->getAllAsJSON();
        
        echo $vobjCourse->toJSON();
    }    
}

$appl = new CourseCtl();

if($_SERVER['REQUEST_METHOD'] === 'POST') 
     $appl->doPost();
else
     $appl->doGet();
                                                    
?>