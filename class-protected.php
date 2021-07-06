<?php

class Animal
{
  protected $race, $family, $age, $gender;

  public function set_race($race_type)
  {
    $this->race = $race_type;
  }

  public function get_race()
  {
    return $this->race ? $this->race : " unknown type of animals ";

  }

  public function set_family($set_kind)
  {
    $this->family = $set_kind;
  }

  public function get_family()
  {
    return $this->family ? $this->family : " unknown family of animals ";
  }

  public function set_age($years_old)
  {
    $this->age = $years_old;
  }

  public function get_age()
  {
    return $this->age ? $this->age : " indicate the age of the animal ";
  }

  public function set_gender($gender_value) 
  {
    $this->gender = $gender_value;
  }

  public function get_gender() 
  {
    return $this->gender ? $this->gender : " unknown gender ";
  }

  function get_info()
  {
    return  " race:" . ' ' . $this->race . ' ' . "family:" . ' ' . $this->family . ' ' . "age:" . ' ' . $this->age . ' ' . "gender:" . ' ' . $this->gender;
  }

}

class Mammal extends Animal
{

  protected $species;

  public function set_species($species)
  {
    $this->species = $species;
  }

  public function get_species()
  {
    return $this->species ? $this->species : " unknown animal's type ";
  }

  public function get_info()
  {
    return parent::get_info() . " animal's type: " . $this->get_species();
  }

}

class Cat extends Mammal
{

  protected $catBreed, $name;

  public function set_catBreed($catBreed)
  {
    $this->catBreed = $catBreed;
  }

  public function get_catBreed()
  {
    return $this->catBreed ? $this->catBreed :  " unknown breed ";
  }

  public function set_name($name_value)
  {
    $this->name = $name_value;
  }

  public function get_name()
  {
    return $this->name ? $this->name : " indicate the cat's name ";
  }

  public function get_info()
  {
    return parent::get_info() . " catBreed: " . $this->get_catBreed() . " " . "name:" . " " . $this->get_name() . "\n";
  }
}


$my_cat = new Cat();

$my_cat->set_race("mammal\n");
$my_cat->set_family("cats\n");
$my_cat->set_age("4 years\n");
$my_cat->set_gender("boy\n");
$my_cat->set_species("pet\n");
$my_cat->set_catBreed("Siberian cat\n");
$my_cat->set_name("Lyolik\n"); 


echo $my_cat->get_info();

?>
