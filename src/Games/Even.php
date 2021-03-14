<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

const RIGHT_ANSWERS_COUNT = 3;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function askQuestion()
{
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
}


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

function play()
{
    $rightAnswersCount = 0;
    $playerName = greeting();
    askQuestion();

    while ($rightAnswersCount < RIGHT_ANSWERS_COUNT) {
        $number = generateNumber();
        $rightAnswer = getRightAnswer(isEven($number));
        line("Question: {$number}");
        $playersAnswer = prompt('Your answer', '', ': ');
        if ($playersAnswer === $rightAnswer) {
            $rightAnswersCount++;
            line("Correct!");
        } else {
            line("'{$playersAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, {$playerName}!");
            break;
        }
    }

    if ($rightAnswersCount === RIGHT_ANSWERS_COUNT) {
        line("Congratulations, {$playerName}!");
    }
}