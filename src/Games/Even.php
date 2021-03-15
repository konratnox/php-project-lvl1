<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

const GAME_TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateNumber(): int
{
    return rand(1, 100);
}

function isEven(int $number): bool
{
    return $number % 2 == 0;
}

function getRightAnswer(bool $isEven): string
{
    return $isEven ? 'yes' : 'no';
}

function getGameData(): array
{
    $number = generateNumber();
    $rightAnswer = getRightAnswer(isEven($number));
    return [$number, $rightAnswer];
}

function play()
{
    run(fn() => getGameData(), GAME_TASK);
}
