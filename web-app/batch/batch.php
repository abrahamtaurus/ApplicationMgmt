
<?php
include "dbconnection.php";
Class batch
{
    private $id; 
    private $year_2;
    private $is_open;

    
    function __construct($pid,$pcourse_id, $pyear_2, $pis_open)
    {
        $this->setid($pid);
        $this->setcourse_id($pcourse_id);
        $this->setyear_2($pyear_2);
        $this->setis_open($pis_open);
    }
    public function setid($pid)
    {
        $this->id = $pid;
    } 
    public function setcourse_id($pcourse_id)
    {
        $this->course_id = $pcourse_id;
    } 
    
    public function setyear_2($pyear_2)
    {
        $this->year_2 = $pyear_2;
        
    }
    public function setis_open($pis_open)
    {
        $this->is_open = $pis_open;
        
    }
    public function toJSON()
    {
        return json_encode("{id: $this->id,course_id:$this->course_id year_2:$this->year_2, is_open: $this->is_open");
    }
}
?>