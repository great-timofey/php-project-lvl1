<?php

namespace Braingames\Games\Calc;

$rules = "What is the result of the expression?";

function getGameAttributes()
{
    global $rules;
    $operations = ['+' => fn($a, $b) => $a + $b, '-' => fn($a, $b) => $a - $b, '*' => fn($a, $b) => $a * $b];

    $step = function () use ($operations) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operationsLength = count($operations) - 1;
        $randomOperationIndex = rand(0, $operationsLength);

        $operand = array_keys($operations)[$randomOperationIndex];

        $closure = $operations[$operand];

        $question = "{$firstNumber} {$operand} {$secondNumber}";
        $answer = $closure($firstNumber, $secondNumber);

        return ['question' => $question, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}

function run()
{
    $game = getGameAttributes();
    \Braingames\GameEngine\startGame($game);
}
