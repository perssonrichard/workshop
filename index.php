<?php
session_start();

// We are setting the cookie, a varaible containing a random number between 1 and 27
if(isset($_SESSION['randomNumber']) == false) {
    $_SESSION['randomNumber'] = rand(1, 27);
}

?>

<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>

 <?php 
 // This is the random number that the player should guess, notice that this number is suppsoed to be invisible 
 // but for developments sake we leave it visible right now.
 echo $_SESSION['randomNumber'];
  
 ?>
 <br> 
 <form name="form" action="index.php">
   <input type="number" name="guess" id="guess">
   <input type="submit" name="submit" value="Guess!"/>
 </form>
 <?php

 // This if statement checks if the guess was right or wrong
 if ($_GET["guess"] == $_SESSION['randomNumber'])
 {
     echo "Right guess!<br>";
 }
 else
 {
     echo "Try again!<br>";
 }

 ?>
 </body>
</html>