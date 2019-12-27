<?php

namespace Braingames\Game;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line("Welcome to the Brain Games!\n");
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");

    $name = prompt("May I have your name?");
    line("Hello, {$name}!");

    for ($i = 0; $i < 3; $i++) {
        $randomNumber = rand(1, 100);
        $correctAnswer = $randomNumber % 2 === 0 ? 'yes' : 'no';

        line("Question: {$randomNumber}");

        $answer = prompt("Your answer: ");

        if ($answer !== $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}");
            exit();
        }

        line("Correct!\n");
    }

    line("Congratulations, ${name}!\n");
}
