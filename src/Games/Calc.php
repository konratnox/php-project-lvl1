<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const GAME_TASK = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];

function getMathOperation(): string
{
    return OPERATIONS[array_rand(OPERATIONS)];
}

function generateNumber(): int
{
    return rand(1, 10);
}

function generateQuestion(string $operation, int $number1, int $number2): string
{
    return "$number1 $operation $number2";
}

function getRightAnswer(string $operation, int $number1, int $number2): int
{
    switch ($operation) {
        case '+':
            $answer = $number1 + $number2;
            break;
        case '-':
            $answer = $number1 - $number2;
            break;
        case '*':
            $answer = $number1 * $number2;
            break;
        default:
            throw new \Exception("Wrong operation {$operation}");
    }
    return $answer;
}

function getGameData(): array
{
    $operation = getMathOperation();
    $number1 = generateNumber();
    $number2 = generateNumber();
    $question = generateQuestion($operation, $number1, $number2);
    $rightAnswer = getRightAnswer($operation, $number1, $number2);
    return [$question, (string) $rightAnswer];
}

function play()
{
    run(fn() => getGameData(), GAME_TASK);
}
