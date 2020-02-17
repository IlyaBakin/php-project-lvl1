<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function runEvenGame()
{
    evenGame();
    return 0;
}

function runCalcGame()
{
    calcGame();
    return 0;
}

function runGcdGame()
{
    gcdGame();
    return 0;
}

function runProgressGame()
{
    progressGame();
    return 0;
}
