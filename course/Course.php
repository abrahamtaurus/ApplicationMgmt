<?php
    class Course{
        
        private $id;
        private $courseName;
        private $isActive;
        
        public function __construct($pid, $pcourseName, $pisActive){
            $this->setId($pid);
            $this->setCourseName($pcourseName);
            $this->setIsActive($pisActive);
        }
        
        public function setId($pid){
            $this->id = $pid;
        }
        
        public function getId(){
            return $this->id;
        }
        public function setCourseName($pcourseName){
            $this->courseName = $pcourseName;
        }
        
        public function getCourseName(){
            return $this->courseName;
        }
        public function setIsActive($pisActive){
            $this->isActive = $pisActive;
        }
        
        public function getIsActive(){
            return $this->isActive;
        }
        
        public function toJSON(){
            return json_encode("{id:" . $this->getId() . ", courseName: " . $this->getCourseName() . " isActive: " . $this->getIsActive() . "}");
        }
    }

?>