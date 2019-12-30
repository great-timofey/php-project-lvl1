<?php

namespace Braingames\Games\Gcd;

use function \cli\line;
use function \cli\prompt;

function getGameAttributes()
{
    $rules = 'Find the greatest common divisor of given numbers.';

    $step = function () {
        $first = rand(1, 100);
        $second = rand(1, 100);
        $lessValue = $first < $second ? $first : $second;
        $answer = 1;

        for ($i = $answer + 1; $i <= $lessValue; $i++) {
            if ($first % $i === 0 && $second % $i === 0) {
                $answer = $i;
            }
        }

        return ['question' => "{$first} {$second}", 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}
