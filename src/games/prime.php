<?php

namespace Braingames\Games\Prime;

use function \cli\line;
use function \cli\prompt;

function getGameAttributes()
{
    $rules = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
