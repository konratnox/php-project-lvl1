<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const GAME_TASK = 'Find the greatest common divisor of given numbers.';

function generateNumber(): int
{
    return rand(1, 10);
}

function getGcd(int $number1, int $number2): int
{
    while ($number1 !== 0 && $number2 !== 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }

    return $number1 + $number2;
}

function generateQuestion(int $number1, int $number2): string
{
    return "$number1 $number2";
}

function getGameData(): array
{
    $number1 = generateNumber();
    $number2 = generateNumber();
    $gcd = getGcd($number1, $number2);
    $question = generateQuestion($number1, $number2);
    return [$question, (string) $gcd];
}

function play(): void
{
    run(fn() => getGameData(), GAME_TASK);
}
