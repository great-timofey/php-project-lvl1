<?php

namespace Braingames\Games\Progression;
use function \Braingames\GameEngine\startGame;

function getGameAttributes()
{
    $rules = 'What number is missing in the progression?';
    $sequenceLength = 10;

    $generateStep = function () use ($sequenceLength) {
        $missingNumber = 0;
        $initialNumber = rand(0, 10);
        $sequenceStep = rand(2, 10);
        $indexOfMissed = rand(0, $sequenceLength);
        $question = '';

        for ($i = 0; $i <= $sequenceLength; $i++) {
            $currentNumber = $i * $sequenceStep;
            $currentOffset = $initialNumber + $currentNumber;

            if ($i === $indexOfMissed) {
                $question = "{$question} ..";
                $missingNumber = $currentOffset;
            } else {
                $question = "{$question} {$currentOffset}";
            }
        }

        return ['question' => $question, 'answer' => $missingNumber];
    };

    return ['rules' => $rules, 'generateStep' => $generateStep];
}

function run()
{
    $game = getGameAttributes();
    startGame($game);
}
