<?php

class Person {

	public $age, $name, $surname, $gender;

	function get_info($obj){
		return $obj->name . ' ' . $obj->surname . "\n";
	}

}

$sasha = new Person();

$sasha->age = 17;
$sasha->name = "Alexander";
$sasha->surname = "Svistoplyasov";
$sasha->gender = 1;

echo $sasha->get_info($sasha);

?>