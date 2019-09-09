<?php

  require_once("game.php");

  /**
   * Session-based (game) storage
   */
  class Store {

    private $STRING_NAME = "randomNumberX";

    // constructor; initialize PHP session
    public function __construct()
    {
      session_start();
    }

    public function get(string $key)
    {
      if(!isset($_SESSION[$key])) return false;
      return $_SESSION[$key];
    }

    public function set(string $key, $value)
    {
      $_SESSION[$key] = $value;
    }

    public function destroy()
    {
      session_destroy();
    }

    public function GetCurrentGame() {
      $currentGame = $this->get($this->STRING_NAME);
      
      if($currentGame == false) {
        return new Game();
      } else {
        return $currentGame;
      }
    }

    public function SaveGame($game) 
    {
      $this->set($this->STRING_NAME, $game);
    }

  }

?>
