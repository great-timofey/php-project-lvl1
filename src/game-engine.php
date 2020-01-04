<?php

namespace Braingames\GameEngine;

use function \cli\line;
use function \cli\prompt;

function run(array $game)
{
    line('Welcome to the Brain Games!');

    ['rules' => $rules, 'step' => $generateStep] = $game;

    line($rules . "\n");

    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");


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
