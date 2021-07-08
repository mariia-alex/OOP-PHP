<?php

abstract class Speaklanguages
{
  private $person_name = "Oleg";

  abstract function can_speak(); 
  
  function intro()
  {
    
    echo "I am " . $this->person_name . " and I can speak " . strtolower(get_class($this)) . " \n";
    
    }
}

class English extends Speaklanguages
{

    function can_speak()
  {
    
    echo "I can speak English\n";
  }

}

class Español extends Speaklanguages
{
  
   function can_speak()
  {
    
    echo "Yo sé hablar el Español muy bien!\n";
  }

}


class Italian extends Speaklanguages
{
  
    function can_speak()
  {
    
    echo "Io so parlare italiano\n";
  }

}

class Russian extends Speaklanguages
{
  
    function can_speak()
  {
    
    echo "Я свободно говорю на русском языке\n";
  }

}

class Person
{

  public $name, $surname, $age, $gender;
  //private $lang;

  function get_info()
  {
    return $this->name . ' ' . $this->surname . "\n";
  }
  
  function intro($lang)
  {
    if (method_exists($lang, "can_speak")) {
      $this->lang = $lang;
      $lang->intro();
    }
  }
}
  
  $english = new English();
  $español = new Español();
  $italian = new Italian();
  $russian = new Russian();
  $person = new Person();
  $person->name = "Oleg";
  $person->surname = "Popov:";

  echo $person->get_info($person);
  
  
    //function speak_lang($person)
  //{
    //$person->intro();
  //}
  
  $lang_list = [$english, $español, $italian, $russian];

  foreach ($lang_list as $one_lang) {
    $person->intro($one_lang);
  }

  ?>
  