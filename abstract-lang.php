<?php

abstract class Speaklanguages
{
  private $name;

  function intro() {
    
    echo "I am " . $this->name . " and I can speak " . strtolower(get_class($this)) . " \n";
  }

  abstract function can_speak();
  //{
    //$this->intro();
    
    //}
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
    // TODO: Implement intro() method.
    echo "Yo sé hablar el Español muy bien!\n";
  }

}


class Italian extends Speaklanguages
{

  function can_speak()
  {
    // TODO: Implement intro() method.
    echo "Io so parlare italiano\n";
  }

}

class Russian extends Speaklanguages
{

  function can_speak()
  {
    // TODO: Implement intro() method.
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
      $lang->can_speak();
    }
  }
}

  $english = new English();
  $español = new Español();
  $italian = new Italian();
  $russian = new Russian();
  $oleg = new Person();
  $oleg->name = "Oleg";
  $oleg->surname = "Popov:";

  echo $oleg->get_info($oleg);
  
  $lang_list = [$english, $español, $italian, $russian];

  foreach ($lang_list as $one_lang) {
    $oleg->intro($one_lang);
  }

  ?>
  

  
  