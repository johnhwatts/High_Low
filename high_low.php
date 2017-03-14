<?php

$randomNumber = mt_rand(1, 100); //Generate random number
$playGame = true; //Initialize game with boolean so that we can end the game when user guesses right
$guesses = 1; 

fwrite(STDOUT, 'Guess the random number... '); //write to user

$userNumber = fgets(STDIN); //get input from user

//use a while loop with conditionals inside 
while($playGame) {

	if ($userNumber == 0) {
		echo "GAME EXIT". PHP_EOL;
		$playGame = false;

	} else if ($userNumber < $randomNumber) {
		echo "HIGHER" . PHP_EOL;
		fwrite(STDOUT, 'Guess the random number... ');
		$userNumber = fgets(STDIN);
		$guesses ++;

	} else if ($userNumber > $randomNumber) {
		echo "LOWER" . PHP_EOL;
		fwrite(STDOUT, 'Guess the random number... ');
		$userNumber = fgets(STDIN);
		$guesses++;

	} else if ($randomNumber == $userNumber) {
		echo "GOOD GUESS!" . " You made " . $guesses . " guesses." . PHP_EOL;
		$playGame = false;
	
	}
}