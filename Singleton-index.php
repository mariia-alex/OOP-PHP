<?php

class Database
{

  static $obj;

  private function __clone() {

  }
  
  private function __wakeup() {

  }

  private function __construct()
  {

    require_once "singleton-config.php";

    $this->con = new PDO("mysql:host=$host;db_name=$db_name", $user_name, $password);
  }

  static public function getConnect()
  {
    if (empty(self::$obj)) 
      self::$obj = new self();
    return self::$obj->con;
  }
}

$con = Database::getConnect();

$sql = "SELECT name, title, genre FROM authors INNER JOIN books ON (authors.author_id = books.genre_id) INNER JOIN genres ON (books.genre_id =
genres.genre_id)";

$db = $con->query($sql)->fetch_all(PDO::FETCH_ASSOC);

print_r($db);

?>
