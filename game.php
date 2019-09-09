<?php

require_once("rules.php");

/**
 * Game Model
 */
class Game {
  
  private $currentGuess;
  private $totalGuesses = 0;
  private $hiddenNumber = 0;
  
  public function __construct() {
    $this->hiddenNumber = $this->GenerateHiddenNumber();
    $this->rules = new Rules();
  }

  public function GenerateHiddenNumber()
  {
    return mt_rand($this->rules->minGuessValue, $this->rules->maxGuessValue); 
  }

  public function MakeGuess($guess) {
    $this->currentGuess = $guess;
    $this->totalGuesses++;
  }

  public function WasGuessCorrect() {
    if ($this->currentGuess == $this->hiddenNumber)
    {
        return true;
    }
    else
    {
        return false;
    }
  }


}

?>
