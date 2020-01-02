<?php

namespace Braingames\Games\Progression;

use function \cli\line;
use function \cli\prompt;

function getGameAttributes()
{
    $rules = 'What number is missing in the progression?';
    $sequenceLength = 9;

    $step = function () use ($sequenceLength) {
        $answer = 0;
        $initialNumber = rand(0, 20);
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

        return ['question' => trim($question), 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}
