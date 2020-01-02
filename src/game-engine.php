<?php

namespace Braingames\Core;

use function \cli\line;
use function \cli\prompt;

function getGame(string $gameName)
{
    switch ($gameName) {
        case 'calc':
            return \Braingames\Games\Calc\getGameAttributes();

        case 'gcd':
            return \Braingames\Games\Gcd\getGameAttributes();

        case 'even':
            return \Braingames\Games\Even\getGameAttributes();

        default:
            return 'Error! Game with this name does not exist.';
    }
}

function run(string $gameName)
{
    line("Welcome to the Brain Games!\n");

    ['rules' => $rules, 'step' => $generateStep] = getGame($gameName);

    line($rules);

    $name = prompt("May I have your name?");
    line("Hello, {$name}!");


    for ($i = 0; $i < 3; $i++) {
        ['question' => $gameQuestion, 'answer' => $gameAnswer] = $generateStep();

        line("Question: {$gameQuestion}");
        $answer = prompt("Your answer");

        if ($gameAnswer != $answer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$gameAnswer}'.");
            line("Let's try again, {$name}");
            exit();
        }

        line("Correct!\n");
    }

    line("Congratulations, ${name}!\n");
}
