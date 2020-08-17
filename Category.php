<?php


class Category{
    private $id; 
    private $name;
    private $shortName;
    
    
    function __construct($pid, $pname, $pshortName)
    {
        $this->setId($pid);
        $this->setName($pname);
        $this->setShortName($pshortName);
        
    }

    public function setId($pid){
        $this->id = $pid;
    } 
    
    public function setName($pname){
        $this->name = $pname;
        
    }
    public function setShortName($pshortName){
        $this->shortName = $pshortName;
        
    }
    
    public function toJSON(){
        return json_encode("{id: $this->id, name:$this->name, shortName: $this->shortName}");
    }
}
?>