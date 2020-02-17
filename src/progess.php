<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function progressGame()
{

    line('Welcome to the Brain Game!');
    line("What number is missing in the progression?");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $currentAnswers = [];

    while (count($currentAnswers) < 3) {
        $randProgressStep = rand(3, 7);
        $randCountSteps = rand(8, 12);
        $i = 1;
        $progressiv = [];
        while ($i <= $randCountSteps) {
            $progressiv[] = $i * $randProgressStep;
            $i++;
        }
        $progressivStringQuestionNumberIndex = rand(0, count($progressiv) - 1);
        $progressivStringQuestionNumber = $progressiv[$progressivStringQuestionNumberIndex];
        $progressiv[$progressivStringQuestionNumberIndex] = '...';
        $progressivString = implode(" ", $progressiv);

        $answer = prompt("Question: {$progressivString}");

        if ($answer == $progressivStringQuestionNumber) {
            $currentAnswers[] = $answer;
            line("Your answer: %d", $answer);
            line("Correct!");
        } else {
            line("Your answer: %d", $answer);
            line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answer, $progressivStringQuestionNumber);
            line("Let's try again, %s!", $name);
            $currentAnswers = [];
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
