<?php

namespace Braingames\Games\Even;

$rules = 'Answer "yes" if the number is even, otherwise answer "no"';

function getGameAttributes()
{
    global $rules;

    $isEven = fn(int $a) => $a % 2 === 0;

    $step = function () use ($isEven) {
        $randomNumber = rand(1, 100);
        $answer = $isEven($randomNumber) ? 'yes' : 'no';

        return ['question' => $randomNumber, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}

function run()
{
    $game = getGameAttributes();
    \Braingames\GameEngine\startGame($game);
}
