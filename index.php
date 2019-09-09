<?php

// dependencies
require("gameController.php");

// initialize new game
// TODO: support for options
$game = new gameController();
$game->PlayGame();
