/**
*Author:Sushumna S Pradeep
*Purpose:
*Date:23/08/2020  
*/
<?php
class Course {
    private $id;
    private $courseName;
    private $isActive;
  
    public function __construct($pid,  $pcourseName, $pisActive)
    {
      $this->id = $pid;
      $this->courseName = $pcourseName;
      $this->isActive = $pisActive;
    }
    
    public function setId($pid)
    {
      $this->id = $pid;
    }
  
    public function getId(){
      return $this->id;
    }
   
    public function setcourseName($pcourseName){
        return $this->courseName =$pcourseName;
    }
   
    public function getcourseName(){
        return $this->courseName;
    }
  
    public function setisActive($pisActive){
      $this->isActive = $pisActive;
    }
    
    public function getisActive(){
        return $this->isActive;
    }
  
    public function toJSON()
    {
          return json_encode("{id: $this->id, courseName: $this->courseName, isActive: $this->isActive}");
    }
  }
?>