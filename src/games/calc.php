<?php

namespace Braingames\Games\Calc;
use function \Braingames\GameEngine\startGame;

function getGameAttributes()
{
    $rules = "What is the result of the expression?";
    $operations = ['+' => fn($a, $b) => $a + $b, '-' => fn($a, $b) => $a - $b, '*' => fn($a, $b) => $a * $b];

    $generateStep = function () use ($operations) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operationsLength = count($operations) - 1;
        $randomOperationIndex = rand(0, $operationsLength);

        $operand = array_keys($operations)[$randomOperationIndex];

        $calculate = $operations[$operand];

        $question = "{$firstNumber} {$operand} {$secondNumber}";
        $answer = $calculate($firstNumber, $secondNumber);

        return ['question' => $question, 'answer' => $answer];
    };

    return ['rules' => $rules, 'generateStep' => $generateStep];
}

function run()
{
    $game = getGameAttributes();
    startGame($game);
}
