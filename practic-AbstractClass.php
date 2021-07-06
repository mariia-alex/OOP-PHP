<?php

abstract class a_shoes {
abstract function put_on();
}

class Shoes extends a_shoes {

function put_on() {

   echo "Look at my shoes, my shoes are amazing!\n";
   }
  }
  
 class Sandals {
 
 function put_on() {
 
 echo "Look at my sandals, my sandals are amazing!\n";  
 
 }
 }
 
 class Sneackers {
 function put_on() {
 echo "Look at my sneakers, my sneackers are amazing!\n";
 }
 }
 
 class Boots {
 function put_on() {
 echo "Winter boots, winter boots, walking are all the way!\n";
 }
 
 
 }
 
 class Cutie {
 private $shoes;
 
 function get_ready($shoes) {
 if (method_exists($shoes, "put_on")) {
 $this->shoes = $shoes;
 $shoes->put_on();
 }
 }
 }
 
 
 $shoes = new Shoes();
 $sandals = new Sandals();
 $sneackers = new sneackers();
 $boots = new Boots();
 
 $shoes_list = [$shoes, $sandals, $sneackers, $boots];
 
 $lady = new Cutie();
 
 
 foreach ($shoes_list as $one_pair) {
 $lady->get_ready($one_pair);
 }
 
 ?>
