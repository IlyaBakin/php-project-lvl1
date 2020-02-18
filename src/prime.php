<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function primeGame()
{

    line('Welcome to the Brain Game!');
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $currentAnswers = [];

    while (count($currentAnswers) < 3) {
        $randNumber = rand(1, 100);

        $isPrime = 'yes';

        if ($randNumber % 2 == 0) {
            $isPrime = 'no';
        }
        $i = 3;
        while ($i <= (int)sqrt($randNumber)) {
            if ($randNumber % $i == 0) {
                $isPrime = 'no';
                break;
            }
            $i += 2;
        }

        $answer = prompt("Question: {$randNumber}");

        if ($answer == $isPrime) {
            $currentAnswers[] = $answer;
            line("Your answer: %s", $answer);
            line("Correct!");
        } else {
            line("Your answer: %s", $answer);
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $isPrime);
            line("Let's try again, %s!", $name);
            $currentAnswers = [];
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
