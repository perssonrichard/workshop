<?php

require_once("game.php");

/**
 * HTML output view
 */
class View {

  public function __construct() {
    $this->game = new Game();
  }

  public function GetUserInputForm() {
    $output = "<form name=\"form\" action=\"index.php\">
      <input type=\"number\" name=\"guess\" id=\"guess\" />
      <input type=\"submit\" name=\"submit\" value=\"Guess!\"/>
    </form>";

    return $output;
  }

  public function GetGameResultOutput() {
    $corectGuess = $this->game->CompareGuess($guess);

      if($corectGuess) {
        $result = "Winner!";
      } else {
        $result = "Incorrect!";
      }

      return $result;
  }

  public function HasUserGuessNumber() {
    // TODO: move magic string?
    // TODO: validate input!
    return (isset($_GET["guess"]) && strlen($_GET["guess"]) > 0); 
  }

  public function GetUserGuess() 
  {
    // TODO: validate number
    return $_GET['guess'];
  }

  public function EchoHtmlPage(string $title, string $body) {
    $output =
    "<html>
      <head>
        <title>$title</title>
      </head>
      <body>
        $body
      </body>
    </html>";

    echo $output;
  }
}

?>
