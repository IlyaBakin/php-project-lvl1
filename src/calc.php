<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function calcGame()
{
    line('Welcome to the Brain Game!');
    line("What is the result of the expression?");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $mathOperations = ['+','-','*'];

    $currentAnswers = [];
    while (count($currentAnswers) < 3) {
        $randFirstNumber = rand(1, 100);
        $randSecondNumber = rand(1, 100);
        $randMathOperation = $mathOperations[array_rand($mathOperations)];
        $answer = prompt("Question: $randFirstNumber $randMathOperation $randSecondNumber");
        $currectAnswer = "";
        switch ($randMathOperation) {
            case '+':
                $currectAnswer = $randFirstNumber+$randSecondNumber;
                break;
            case '-':
                $currectAnswer = $randFirstNumber-$randSecondNumber;
                break;
            case '*':
                $currectAnswer = $randFirstNumber*$randSecondNumber;
                break;
        }
        if ($answer == $currectAnswer) {
            $currentAnswers[] = $currectAnswer;
            line("Your answer: %d", $answer);
            line("Correct!");
        } else {
            line("Your answer: %d", $answer);
            line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answer, $currectAnswer);
            line("Let's try again, %s!", $name);
            $currentAnswers = [];
        }
    }
    line("Congratulations, %s!", $name);
    return 0; 
}
