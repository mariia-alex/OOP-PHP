<?php

Class Animal
{
  public $race, $family, $size, $gender;

  function get_info()
  {
    return $this->race . ' ' . $this->family . "\n";
  }
}

class Cats extends Animal
{

  public $catBreed;

  public function set_catBreed($catBreed)
  {
    $this->catBreed = $catBreed;
  }

  public function get_catBreed()
  {
    return $this->catBreed ? $this->catBreed . "\n" :  " unknown type " . "\n";
  }

    public function get_info()
  {
    return parent::get_info() . " catBreed: " . $this->get_catBreed();
  }
}

$animal = new Animal();

$animal->race = "mammal";
$animal->family = "cat family";
$animal->size = 1;
$animal->gender = 1;


$my_cat = new Cats();
$my_cat->race = "mammal";
$my_cat->family = "cats";
$my_cat->catBreed = "Siberian cat";

echo $my_cat->get_info();