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
  }

  public function GenerateHiddenNumber()
  {
    // TODO: use rules
    return mt_rand(1, 27); 
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
