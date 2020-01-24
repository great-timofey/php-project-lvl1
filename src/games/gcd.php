<?php

namespace Braingames\Games\Gcd;
use function \Braingames\GameEngine\startGame;

function getGameAttributes()
{
    $rules = 'Find the greatest common divisor of given numbers.';

    $findGcd = function (int $first, int $second) {
        $lessValue = $first < $second ? $first : $second;
        $greatestCommonDivisor = 1;

        for ($i = $greatestCommonDivisor + 1; $i <= $lessValue; $i++) {
            if ($first % $i === 0 && $second % $i === 0) {
                $greatestCommonDivisor = $i;
            }
        }

        return $greatestCommonDivisor;
    };

    $generateStep = function () use ($findGcd) {
        $first = rand(1, 100);
        $second = rand(1, 100);

        $greatestCommonDivisor = $findGcd($first, $second);

        return ['question' => "{$first} {$second}", 'answer' => $greatestCommonDivisor];
    };

    return ['rules' => $rules, 'generateStep' => $generateStep];
}

function run()
{
    $game = getGameAttributes();
    startGame($game);
}
