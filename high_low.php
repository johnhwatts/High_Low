<?php
//Conditional for new arguments: if user input is greater than 3 it will be ignored (>=) 
if ($argc >= 3 && is_numeric($argv[1]) && is_numeric($argv[2])) {
	$randomNumber = mt_rand($argv[1],$argv[2]);
//if user input is not an integer, there will be an error and the game will restart
} else if ($argc >= 3 && (!is_numeric($argv[1]) || !is_numeric($argv[2]))) {
	fwrite(STDOUT, "Please enter 2 integers between 1 and 100" . PHP_EOL);
	exit(0);
//if user input is less than three the random number will trigger
} else if ($argc < 3) {
	$randomNumber = mt_rand(1, 100);
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
