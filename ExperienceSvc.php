<?php
include 'Experience.php';
class ExperienceSvc
{
    private $objRepo;
    public function __construct()
    {
        $this->objRepo = new ExperienceRepo();
    }
    public function save($pobjExperience)
    {
        if($pobjExperience->getcandidate_id()==-1)
        {
            $this->objRepo->insert($pobjExperience);
        }
    }
}
?>