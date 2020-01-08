<?php

namespace Braingames\Games\Progression;

$rules = 'What number is missing in the progression?';

function getGameAttributes()
{
    global $rules;
    $sequenceLength = 10;

    $step = function () use ($sequenceLength) {
        $answer = 0;
        $initialNumber = rand(0, 10);
        $sequenceStep = rand(2, 10);
        $indexOfMissed = rand(0, $sequenceLength);
        $question = '';

        for ($i = 0; $i <= $sequenceLength; $i++) {
            $currentNumber = $i * $sequenceStep;
            $currentOffset = $initialNumber + $currentNumber;

            if ($i === $indexOfMissed) {
                $question .= " ..";
                $answer = $currentOffset;
            } else {
                $question .= ' ' . $currentOffset;
            }
        }

        return ['question' => $question, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}

function run()
{
    $game = getGameAttributes();
    \Braingames\GameEngine\startGame($game);
}
