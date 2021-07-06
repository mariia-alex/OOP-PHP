<?php

Class Animal
{
  public $race, $family, $size, $gender;

  function get_info()
  {
    return " race:" . ' ' . $this->race . ' ' . "family:" . ' ' . $this->family;
  }
}

class Cat extends Animal
{

  public $catBreed, $name;

  public function set_catBreed($catBreed)
  {
    $this->catBreed = $catBreed;
  }

  public function get_catBreed()
  {
    return $this->catBreed ? $this->catBreed :  " unknown type ";
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
    return parent::get_info() . " catBreed: " . $this->get_catBreed() . " " . "name:" . " " . $this->get_name();
  }

}

$animal = new Animal();

$animal->race = "mammal";
$animal->family = "cat family";
$animal->size = 1;
$animal->gender = 1;


$my_cat = new Cat();

$my_cat->race = "mammal\n";
$my_cat->family = "cats\n";
$my_cat->catBreed = "Siberian cat\n";
$my_cat->name = "Lyolik\n";

echo $my_cat->get_info();