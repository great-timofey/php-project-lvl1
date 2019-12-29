<?php

namespace Braingames\Games\Even;

use function \cli\line;
use function \cli\prompt;

function getGameAttributes()
{
    $rules = 'Answer "yes" if the number is even, otherwise answer "no"';

    $step = function () {
        $randomNumber = rand(1, 100);
        $answer = $randomNumber % 2 === 0 ? 'yes' : 'no';

        return ['question' => $randomNumber, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}
