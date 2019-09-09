<?php 

require_once("game.php");
require_once("store.php");
require_once("rules.php");
require_once("view.php");


/**
 * Game Controller
 */
class GameController {

  private $view;
  private $game;
  // OTOD: move to model
  private $STRING_NAME = "randomNumber"; // TODO: better name!
  private $gameTitle = "Guess-a-number-game";
  
  // constructor ; initialize with a random value in interval
  // as defined by rules
  public function __construct() {
    $this->view = new View(); 
    $this->game = new Game();
    $this->store = new Store();

    // die($rules->$maxGuessValue . '...');

    // set current value into storage ... 
    $current = $this->store->get($this->STRING_NAME);

    // We are setting the cookie, a varaible containing a random number between 1 and 27
    if(!$this->store->get($this->STRING_NAME)) {
      // TODO: use rules
      $this->store->set($this->STRING_NAME, rand(1, 27));
    }

    // This is the random number that the player should guess, notice that this number is suppsoed to be invisible 
    // but for developments sake we leave it visible right now.
    echo $_SESSION[$this->STRING_NAME];

    if(isset($_SESSION[$this->STRING_NAME]) == false) {
      $_SESSION[$this->STRING_NAME] = rand(1, 27);
    }
  }

  public function PlayGame(){
    // if player has input
    if($this->view->hasUserGuessNumber()) {      
      $guess = $this->view->GetUserGuess();    
      $this->game->MakeGuess($guess);
      $resultHTML = "guess was made!";
      // TODO: campare guess

      

      $resultHTML .= $this->view->GetGameResultOutput();
    }  else {
      $resultHTML = 'x';
    }
    
    // append form
    $resultHTML .= $this->view->GetUserInputForm();

    // show html
    $this->view->EchoHtmlPage($this->gameTitle, $resultHTML);
  }
  
  // public function CompareGuess()
  // {
  //   //  . .
  //   if ($_GET["guess"] == $_SESSION['randomNumber'])
  //   {
  //       echo "Right guess!<br>";
  //   }
  //   else
  //   {
  //       echo "Try again!<br>";
  //   }
  // }

}

?>
