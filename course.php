<?php
include "dbconnection.php";
Class course
{
    private $id; 
    private $course_name;
    private $is_active;

    
    function __construct($pid, $pcourse_name, $pis_active)
    {
        $this->setid($pid);
        $this->setcourse_name($pcourse_name);
        $this->setis_active($pis_active);
    }
    public function setId($pid)
    {
        $this->id = $pid;
    } 
    
    public function setcourse_name($pcourse_name)
    {
        $this->course_name = $pcourse_name;
        
    }
    public function setis_active($pis_active)
    {
        $this->is_active = $pis_active;
        
    }
    public function toJSON()
    {
        return json_encode("{id: $this->id, course_name:$this->course_name, is_active: $this->is_active");
    }
}
?>