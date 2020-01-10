<?php

namespace Braingames\Games\Gcd;

function getGameAttributes()
{
    $rules = 'Find the greatest common divisor of given numbers.';

    $findGcd = function (int $first, int $second) {
        $lessValue = $first < $second ? $first : $second;
        $answer = 1;

        for ($i = $answer + 1; $i <= $lessValue; $i++) {
            if ($first % $i === 0 && $second % $i === 0) {
                $answer = $i;
            }
        }

        return $answer;
    };

    $step = function () use ($findGcd) {
        $first = rand(1, 100);
        $second = rand(1, 100);

        $answer = $findGcd($first, $second);

        return ['question' => "{$first} {$second}", 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}

function run()
{
    $game = getGameAttributes();
    \Braingames\GameEngine\startGame($game);
}
