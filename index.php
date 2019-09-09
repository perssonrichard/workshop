<?php

// repport all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// dependencies
require("gameController.php");

// initialize new game
// TODO: support for options
$game = new gameController();
$game->PlayGame();
