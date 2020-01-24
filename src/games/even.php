<?php

namespace Braingames\Games\Even;
use function \Braingames\GameEngine\startGame;


function getGameAttributes()
{

    $rules = 'Answer "yes" if the number is even, otherwise answer "no"';

    $isEven = fn(int $a) => $a % 2 === 0;

    $generateStep = function () use ($isEven) {
        $numberToCheck = rand(1, 100);
        $isNumberEven = $isEven($numberToCheck) ? 'yes' : 'no';

        return ['question' => $numberToCheck, 'answer' => $isNumberEven];
    };

    return ['rules' => $rules, 'generateStep' => $generateStep];
}

function run()
{
    $game = getGameAttributes();
    startGame($game);
}
