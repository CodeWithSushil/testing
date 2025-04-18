<?php
namespace App;

use InvalidArgumentException;

class User {
  public int $age;
  public array $favorite_movies = [];
  public string $name;
  
  /**
   * @param int $age
   * @param string $name
   */
  public function __construct(int $age, string $name)
  {
    $this->age = $age;
    $this->name = $name;
  }
  
  public function tellName(): string 
  {
    return "My name is " . $this->name . ".";
  }
  
  public function tellAge(): string 
  {
    return "I am ".$this->age ." years old.";
  }
}
