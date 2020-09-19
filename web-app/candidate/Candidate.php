<?php
class Candidate {
  private $id;
  private $firstName;
  private $lastName;
  private $dob;
  private $gender;
  private $addrCorrespondance;
  private $addrPerminant;
  private $nationality;
  private $category;
  private $email;
  private $phone;
  private $photo;
  private $categoryy;

  public function __construct($pid,$pcategory, $pfirstName, $plastName, $pdob,$pgender,$paddrCorrespondance,$paddrPerminant,$pnationality,$pcategoryy,$pemail,$pphone,$pphoto)
  {
  $this->id = $pid;
  $this->setCategory($pcategory);
	$this->firstName = $pfirstName;
	$this->lastName = $plastName;
	$this->dob = $pdob;
  $this->gender =$pgender;
  $this->addrCorrespondance= $paddrCorrespondance;
  $this->addrPerminant = $paddrPerminant;
  $this->nationality = $pnationality;
  $this->categoryy = $pcategoryy;
  $this->email = $pemail;
  $this->phone = $pphone;
  $this->photo = $pphoto;
  }
  
  public function setId($pid)
  {
	$this->id = $pid;
  }

  public function getId(){
    return $this->id;
  }
  public function setCategory($pcategory){
    $this->category = $pcategory;
} 

public function getCategory(){
    return $this->category;
} 
 public function setFirstName($pfirstName)  {
    $this->firstName = $pfirstName;
  }
  
  public function getFirstName()  {
    return $this->Firstname;
  }
  
 
  public function setLastName($plastName){
	  return $this->lastName =$plastName;
  }
 
  public function getLastName(){
	  return $this->lastName;
  }

  public function setDob($pdob){
	$this->dob = $pdob;
  }
  
  public function getDob(){
	  return $this->dob;
  }
  public function setGender($pgender){
	$this->gender = $pgender;
  }
  
  public function getGender(){
	  return $this->gender;
  }
  public function setAddrCorrespondance($paddrCorrespondance){
	$this->addrCorrespondance = $paddrCorrespondance;
  }
  
  public function getAddrCorrespondance(){
	  return $this->addrCorrespondance;
  }
  public function setAddrPerminant($paddrPerminant){
	$this->addrPerminant = $paddrPerminant;
  }
  
  public function getAddrPerminant(){
	  return $this->addrPerminant;
  }
  public function setNationality($pnationality){
	$this->nationality = $pnationality;
  }
  
  public function getNationality(){
	  return $this->nationality;
  }
  public function setCategoryy($pcategoryy){
	$this->categoryy = $pcategoryy;
  }
  
  public function getCategoryy(){
	  return $this->categoryy;
  }
  public function setEmail($pemail){
	$this->email = $pemail;
  }
  
  public function getEmail(){
	  return $this->email;
  }
  public function setPhone($pphone){
	$this->phone = $pphone;
  }
  
  public function getPhone(){
	  return $this->phone;
  }
  public function setPhoto($pphoto){
	$this->photo = $pphoto;
  }
  
  public function getPhoto(){
	  return $this->photo;
  }
    
  public function toJSON()
  {
        return json_encode("{id: $this->id,category_id:" . $this->category->toJSON() . ", firstName:$this->firstName, lastName: $this->lastName, dob: $this->dob, gender: $this->gender,addrCorrespondance: $this->addrCorrespondance,addrPerminant: $this->addrPerminant,nationality: $this->nationality,category: $this->category,email: $this->email,phone: $this->phone,photo: $this->photo}");
  }
}
?>