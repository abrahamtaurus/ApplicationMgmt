<?php
include 'course.php';

class coursesvc
{
    public $objRepo;
	public function __construct()
	{
        $this->objRepo = new courserepo();
    }
	public function save($pobjcourse)
	{
		if($pobjcourse->getid()==-1)
		{
			$this->objRepo->insert($pobjcourse);
		}
    }
}

?>