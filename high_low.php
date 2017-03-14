<?php

if ($argc == 3) {
    $randomNumber = mt_rand($argv[1],$argv[2]); //Add empty arguments to be able to pass numbers into the random number geberator
} else {
	$randomNumber = mt_rand(1, 100); //Generate random number
}

$playGame = true; //Initialize game with boolean so that we can end the game when user guesses right
$guesses = 1; 

fwrite(STDOUT, "Guess the random number... "); //write to user

$userNumber = trim(fgets(STDIN)); //get input from user

//use a while loop with conditionals inside 
while($playGame) {

	if ($userNumber == 0) {
		fwrite(STDOUT, "GAME EXIT". PHP_EOL);
		$playGame = false;

	} else if ($userNumber < $randomNumber) {
		fwrite(STDOUT, "HIGHER" . PHP_EOL);
		fwrite(STDOUT, "Keep guessing... ");
		$userNumber = fgets(STDIN);
		$guesses++;

	} else if ($userNumber > $randomNumber) {
		fwrite(STDOUT, "LOWER" . PHP_EOL);
		fwrite(STDOUT, "Keep guessing... ");
		$userNumber = fgets(STDIN);
		$guesses++;

	} else if ($randomNumber == $userNumber) {
		fwrite(STDOUT, "GOOD GUESS!" . " You made " . $guesses . " guesses." . PHP_EOL);
		$playGame = false;
	
	}
}
