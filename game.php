<?php

require_once("store.php");

/**
 * Game Model
 */
class Game {
  
  private $currentGuess;
  private $totalGuesses = 0;
  private $STRING_NAME = "randomNumber"; // TODO: better name!
  
  public function MakeGuess($guess) {
    $this->currentGuess = $guess;
    $this->totalGuesses++;
  }

  public function CompareGuess($guess) {
    if ($guess == $this->store->get($this->STRING_NAME))
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
