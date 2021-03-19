<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const MIN_ELEMENTS_COUNT = 5;
const MAX_ELEMENTS_COUNT = 15;
const MIN_FIRST_ELEMENT = 0;
const MAX_FIRST_ELEMENT = 5;
const MIN_STEP = 1;
const MAX_STEP = 5;
const GAME_TASK = 'What number is missing in the progression?';

function generateProgression(int $startNumber, int $step): array
{
    $count = mt_rand(MIN_ELEMENTS_COUNT, MAX_ELEMENTS_COUNT);
    $number = $startNumber;
    $result = [$number];
    for ($i = 1; $i < $count; $i++) {
        $number = $number + $step;
        $result[] = $number;
    }
    return $result;
}

function getStep(int $minStep, int $maxStep): int
{
    return mt_rand($minStep, $maxStep);
}

function generateNumber(): int
{
    return mt_rand(MIN_FIRST_ELEMENT, MAX_FIRST_ELEMENT);
}

function generateQuestion(array $progression): array
{
    $elemIndex = array_rand($progression);
    $answer = $progression[$elemIndex];
    $question = $progression;
    $question[$elemIndex] = '..';
    $question = implode(' ', $question);
    return [
        $question,
        $answer
    ];
}

function getGameData(): array
{
    $step = getStep(MIN_STEP, MAX_STEP);
    $startNumber = generateNumber();
    $progression = generateProgression($startNumber, $step);
    [$question, $rightAnswer] = generateQuestion($progression);
    return [$question, (string)$rightAnswer];
}

function play(): void
{
    run(fn() => getGameData(), GAME_TASK);
}
