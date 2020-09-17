<?php
include_once "Address.php";
include_once "AddressRepo.php";

    class AddressSvc{
        private $addressRepo;
        
        function __construct(){
            $this->addressRepo = new addressRepo();
        }

        public function save($pobjAddress){
            if($pobjAddress->getId()==-1)
                $this->insert($pobjAddress);
        }

    }
?>