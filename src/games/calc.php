<?php

namespace Braingames\Games\Calc;

use function \cli\line;
use function \cli\prompt;


function getGameAttributes()
{

    $rules = "What is the result of the expression?";
    $operations = ['+' => fn($a, $b) => $a + $b, '-' => fn($a, $b) => $a - $b, '*' => fn($a, $b) => $a * $b];

    $step = function () use ($operations) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operand = array_keys($operations)[rand(0, 2)];

        $closure = $operations[$operand];

        $question = "{$firstNumber} {$operand} {$secondNumber}";
        $answer = $closure($firstNumber, $secondNumber);

        return ['question' => $question, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}
