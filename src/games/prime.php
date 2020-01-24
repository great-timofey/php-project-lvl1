<?php

namespace Braingames\Games\Prime;
use function \Braingames\GameEngine\startGame;

function getGameAttributes()
{

    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $startPrimeNumbers = [0, 1];
    $isSmallNonPrimeNumber = fn($num) => in_array($num, $startPrimeNumbers);

    $generateStep = function () use ($isSmallNonPrimeNumber) {
        $number = rand(0, 100);
        $isPrime = 'yes';

        if ($isSmallNonPrimeNumber($number)) {
            $isPrime = 'no';
        } else {
            for ($i = 2; $i < $number; $i++) {
                if ($number % $i === 0) {
                    $isPrime = 'no';
                    break;
                }
            }
        }

        return ['question' => $number, 'answer' => $isPrime];
    };

    return ['rules' => $rules, 'generateStep' => $generateStep];
}

function run()
{
    $game = getGameAttributes();
    startGame($game);
}
