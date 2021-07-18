<?php

/* AInfo
- title
- genre
- length
- year
- directors
- actors
- IMDBraiting

AInfo -> Movie
- partOfFranchise

"Тёмный рыцарь"
Фантастика-комикс-экранизация
150 
2008
Нолан
Хит Леджер, Бейл
Бэтмен - Нолана
9.6

AInfo -> Serie
- inviteSrars
- season

Movie -> Series
- partOfFranchise
- numberOfSeries
- numberOfSeasons

"Во все тяжкие"
Киминал-триллер-драма
40
2007
разные
Пол, Кренгстон, Эспозито
Во все тяжкие - вселенная
9.5
5*12
5

Users
- firstName
- lastName
- login
- password

PersonalPage
- recomendations
- selectedPoster
- favorite
- seen
- inProgress
*/

abstract class AInfo
{
  public $title, $genres, $length, $year, $directors, $actors, $IMDB;

  public function __construct($title, $genres, $length, $year, $directors, $actors, $IMDB)
  {
    $this->title = $title;
    $this->genres = $genres;
    $this->length = $length;
    $this->year = $year;
    $this->directors = $directors;
    $this->actors = $actors;
    $this->IMDB = $IMDB;
  }
}

class Movie extends AInfo
{
  protected $partOfFranchise;

  public function set_partOfFranchise($partOfFranchise)
  {
    $this->partOfFranchise = $partOfFranchise;
  }

  public function addToRecomendation($page)
  {
    $page->addRecommendations($this);
  }
  public function addToFavorite($page)
  {
    $page->addFavorite($this);
  }
  public function addToSeen($page)
  {
    $page->addSeen($this);
  }

}

class Serie extends AInfo
{
  protected $inviteStars, $season;
  
  public function set_inviteStars($inviteStars)
  {
    $this->inviteStars = $inviteStars;
  }
  public function set_season($season)
  {
    $this->season = $season;
  }
}

class Series extends Movie
{
  protected $numberOfSeries, $numberOfSeasons;
  
  public function set_numberOfSeries($numberOfSeries)
  {
    $this->numberOfSeries = $numberOfSeries;
  }
  
  public function set_numberOfSeasons($numberOfSeasons)
  {
    $this->numberOfSeasons = $numberOfSeasons;
  }
}

class User
{
  protected $firstName, $lastName, $login, $password;

  public function __construct($firstName, $lastName, $login, $password)
  {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->login = $login;
    $this->password = $password;
  }

  public function get_userName()
  {
    return "User " . $this->firstName . " " . $this->lastName . ":" . " Me ha gustado mucho pelicula 'El Camino'. La recomiendo a todos!\n";
  }

  public function set_userPage($page)
  {
    $this->userPage = $page;
  }

  public function user_info()
  {
    $this->userPage->get_favorite();
    $this->userPage->get_seen();
    $this->userPage->get_recommendations();
  }
}

class PersonalPage
{
  public $recomendations = [];
  public $selectedPoster = [];
  public $favorites = [];
  public $seen = [];
  public $inProgress = [];


function addFavorite($film)
  {
    $this->favorite[$film->title] = $film;
  }

  function get_favorite()
  {
    echo "Избранная коллекция:\n";
    print_r($this->favorite);
  }

  function addSeen($film)
  {
    $this->seen[$film->title] = $film;
  }

  function get_seen()
  {
    echo "Просмотренные фильмы:\n";
    print_r($this->seen);
  }

  function addRecommendations($film)
  {
    $this->recommendations[$film->title] = $film;
  }

  function get_recommendations()
  {
    echo "Рекомендуемые к просмотру:\n";
    print_r($this->recommendations);
  }
}

$darkKnight = new Movie("Темный рыцарь", "Фантастика-комикс-Экранизация", "150 мин.", "2008", "Кристофер Нолан", "Хит Ладжер, Кристиан Бэйл", "9.6");
$darkKnight->set_partOfFranchise("Бэтмен: трилогия Нолана");
$nobody = new Movie("Никто", "Боевик-криминал", "91 мин", "2021", "Илья Найшуллер", "Боб Оденкерк, Алексей Серебряков", "7.9");
$elCamino = new Series("Во все тяжкие", "Криминал-триллер-драма", "40 мин./серия", "2007", "Винс Гиллиган", "Аарон Пол, Брайан Крэнстон, Джанкарло Эспозито", "9.2", "5*12", "5 сезонов");
$elCamino->set_partOfFranchise("Киновселенная DC");
$elCamino->set_numberOfSeries("5*12");
$elCamino->set_numberOfSeasons("5 сезонов");
$user = new User("Pedro", "Sanchez", "pedrosanchez", 12345);
$userPage = new PersonalPage();


$elCamino->addToFavorite($userPage);
$elCamino->addToSeen($userPage);
$darkKnight->addToFavorite($userPage);
$darkKnight->addToRecomendation($userPage);
$nobody->addToFavorite($userPage);
$nobody->addToSeen($userPage);


$user->set_userPage($userPage);
$user->user_info();
echo $user->get_userName();