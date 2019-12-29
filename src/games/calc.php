<?php

namespace Braingames\Games\Calc;

use function \cli\line;
use function \cli\prompt;


function getGameAttributes()
{

    $rules = "What is the result of the expression?";

    $operands = ['+' => function ($a, $b) {
        return $a + $b;
    }, '-' => function ($a, $b) {
        return $a - $b;
    }, '*' => function ($a, $b) {
        return $a * $b;
    }];

    $step = function () use ($operands) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operand = array_keys($operands)[rand(0, 2)];

        $closure = $operands[$operand];

        $question = "{$firstNumber} {$operand} {$secondNumber}";
        $answer = $closure($firstNumber, $secondNumber);

        return ['question' => $question, 'answer' => $answer];
    };

    return ['rules' => $rules, 'step' => $step];
}
