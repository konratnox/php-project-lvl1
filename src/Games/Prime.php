<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const MIN_ELEMENT = 2;
const MAX_ELEMENT = 100;
const GAME_TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function generateNumber(): int
{
    return rand(MIN_ELEMENT, MAX_ELEMENT);
}

function isPrime(int $number): bool
{
    if ($number < 1) {
        return false;
    }

    $half = intdiv($number, 2);

    for ($i = 2; $i <= $half; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function getRightAnswer(bool $isPrime): string
{
    return $isPrime ? 'yes' : 'no';
}

function getGameData(): array
{
    $number = generateNumber();
    $rightAnswer = getRightAnswer(isPrime($number));
    return [$number, $rightAnswer];
}

function play()
{
    run(fn() => getGameData(), GAME_TASK);
}
