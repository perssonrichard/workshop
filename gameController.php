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
  private $gameTitle = "Guess-a-number-game"; // TODO: move to model
  
  public function __construct() {
    $this->store = new Store();
    $this->game = $this->store->getCurrentGame();
    $this->view = new View($this->game);

    // get current game from store
    $current = $this->store->GetCurrentGame();
  }

  // TODO: move data handling to model / separated application-data class
  public function PlayGame(){
    // if player has input
    if($this->view->hasUserGuessNumber()) {      
      $guess = $this->view->GetUserGuess();    
      $this->game->MakeGuess($guess);
      $resultHTML = $this->view->GetGameResultOutput();
    }  else {
      $resultHTML = '';
    }
    
    // append form
    $resultHTML .= $this->view->GetUserInputForm();

    // save storage in session
    $this->store->SaveGame($this->game);

    // show html
    $this->view->EchoHtmlPage($this->gameTitle, $resultHTML);
  }

}

?>
