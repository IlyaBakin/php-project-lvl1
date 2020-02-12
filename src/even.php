<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function evenGame()
{
    line('Welcome to the Brain Game!');
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $questionsAndAnsers = [
        15, 17, 5, 6, 10, 22, 33, 16, 18, 20, 22, 30
    ];
    shuffle($questionsAndAnsers);

    $currentAnswers = [];

    foreach ($questionsAndAnsers as $number ) {

        $answe = prompt("Question: {$number}");
        if ($number % 2 == 0) {
        	if ($answe == 'yes') {
        		array_push($currentAnswers, $number);
        		 line('Correct!');
        	} else {
				line("'{$answe}' is wrong answer ;(. Correct answer was 'yes'.", $name);
				line("Let's try again, %s!", $name);
				$currentAnswers = [];
        	}
        } else {
        	if ($answe == 'no') {
        		array_push($currentAnswers, $number);
        		 line('Correct!');
        	} else {
        		line("'{$answe}' is wrong answer ;(. Correct answer was 'no'.", $name);
				line("Let's try again, %s!", $name);
				$currentAnswers = [];
        	}
        }
        if (count($currentAnswers) == 3) {
        	line("Congratulations, %s!", $name);
        	return 1;
        }
    }
}
