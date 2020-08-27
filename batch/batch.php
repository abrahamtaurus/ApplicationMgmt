
<?php

class Batch {
    private $id; 
    private $year_2;
    private $is_open;
    private $course;

    
    function __construct($pid,$pcourse, $pyear_2, $pis_open){
        $this->setid($pid);
        $this->setCourse($pcourse);
        $this->setyear_2($pyear_2);
        $this->setis_open($pis_open);
    }
    
    public function setid($pid){
        $this->id = $pid;
    } 
    
    public function setCourse($pcourse){
        $this->course = $pcourse;
    } 
    
    public function getCourse(){
        return $this->course;
    } 
    
    public function setyear_2($pyear_2){
        $this->year_2 = $pyear_2;
        
    }
    
    public function setis_open($pis_open){
        $this->is_open = $pis_open;
        
    }
    
    public function toJSON(){
        return json_encode("{id: $this->id,course_id:" . $this->course->toJSON() . ", year_2:$this->year_2, is_open: $this->is_open}");
    }
}
?>