<?php

interface WayOfEating
{
  function animalEating();
}

class Predators implements WayOfEating
{
  function animalEating()
  {
    echo "Me gusta comer solamente carne!";
  }
}

class PlantEating implements WayOfEating
{
  function animalEating()
  {
    echo "Me gusta comer una hierba fresca!";
  }
}

class Omnivores implements WayOfEating
{
  function animalEating()
  {
    echo "Puedo comer todo lo que me dan!";
  }
}

abstract class Animal
{
  protected $name, $eating;


  public function set_name($name)
  {
    $this->name = $name;
  }

  public function set_eating($eating)
  {
    $this->eating = $eating;
  }
  public function get_name()
  {
    echo $this->name;
  }
  function to_eat()
  {
    return $this->eating->animalEating();
  }
}

class Lions extends Animal
{
}

class Rabbits extends Animal
{
}

class Monkeys extends Animal
{
}

$lions = new Lions();
$lions->set_name("Big Lion");
$predators = new Predators;
$plantEating = new PlantEating;
$omnivores = new Omnivores;

$lionEating = [$predators, $plantEating, $omnivores];

foreach ($lionEating as $anim) {
  $lions->set_eating($anim);
  $lions->to_eat();

 echo PHP_EOL;
}
echo  $lions->get_name() . ": " . "Ademas me gusta comer carne de rabbits! HAHAHA" . PHP_EOL;
