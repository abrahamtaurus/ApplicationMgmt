<?php
    include "dbConnection.php";
    class Address{
        private $id;
        private $candidate_id;
        private $addr_line1;
        private $addr_line2;
        private $locality;
        private $city;
        private $pincode;
        private $state;
        private $address_type;
        
        function __construct($pid,$pcandidateId, $paddressLine1, $paddressLine2, $plocality, $pcity, $ppincode, $pstate, $paddressType){
            $this->setid($pid);
            $this->setcandidate_id($pcandidateId);
            $this->setaddr_line1($paddressLine1);
            $this->setaddr_line2($paddressLine2);
            $this->setlocality($plocality);
            $this->setcity($pcity);
            $this->setpincode($ppincode);
            $this->setstate($pstate);
            $this->setaddress_type($paddressType);
        }
        
        
        // List of Setters
        public function setid($pid){
            $this->id = $pid;
        }
        public function setcandidate_id($pcandidateId){
            $this->candidate_id = $pcandidateId;
        }
        public function setaddr_line1($paddressLine1){
            $this->addr_line1 = $paddressLine1;
        }
        public function setaddr_line2($paddressLine2){
            $this->addr_line2 = $paddressLine2;
        }
        public function setlocality($plocality){
            $this->locality = $plocality;
        }
        public function setCity($pcity){
            $this->city = $pcity;
        }
        public function setPincode($ppincode){
            $this->pincode = $ppincode;
        }
        public function setState($pstate){
            $this->state = $pstate;
        }
        public function setaddress_type($paddressType){
            $this->address_type = $paddressType;
        }
        public function toJSON(){
            $vstrJSON = "id: $this->id, candidate_id: $this->candidate_id, addr_line1: $this->addr_line1, addr_line2: $this->addr_line2, locality: $this->locality, city: $this->city, pincode: $this->pincode, state: $this->state, address_type: $this->address_type->toJSON()";
            
            return json_encode($vstrJSON);
        }
        public function toString(){
            return json_decode($this->toJSON());
        }
    }

?>

 
  