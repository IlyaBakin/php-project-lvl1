<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function gcdGame()
{

    line('Welcome to the Brain Game!');
    line("Find the greatest common divisor of given numbers.");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $currentAnswers = [];

    while (count($currentAnswers) < 3) {
        $randFirstNumber = rand(1, 100);
        $randSecondNumber = rand(1, 100);

        $answer = prompt("Question: $randFirstNumber $randSecondNumber");

        while ($randFirstNumber != $randSecondNumber) {
            if ($randFirstNumber > $randSecondNumber) {
                $randFirstNumber -= $randSecondNumber;
            } else {
                $randSecondNumber -= $randFirstNumber;
            }
        }

        if ($answer == $randFirstNumber) {
            $currentAnswers[] = $answer;
            line("Your answer: %d", $answer);
            line("Correct!");
        } else {
            line("Your answer: %d", $answer);
            line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answer, $randFirstNumber);
            line("Let's try again, %s!", $name);
            $currentAnswers = [];
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
