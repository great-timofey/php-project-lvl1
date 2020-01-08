<?php

namespace Braingames\Games\Prime;

$rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getGameAttributes()
{

    global $rules;

    $step = function () {
        $number = rand(0, 100);
        $answer = 'yes';
        $smallPrimeNumbers = [0, 1];

        if (in_array($number, $smallPrimeNumbers)) {
            $answer = 'no';
        } else {
            for ($i = 2; $i < $number; $i++) {
                if ($number % $i === 0) {
                    $answer = 'no';
                    break;
                }
            }
        }

        return ['question' => $number, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}

function run()
{
    $game = getGameAttributes();
    \Braingames\GameEngine\startGame($game);
}
