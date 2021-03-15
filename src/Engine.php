<?php

namespace BrainGames\Games\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS_COUNT = 3;

function run(callable $getGameData, string $question): void
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);

    line($question);

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getGameData();
        line("Question: $question");
        $playerAnswer = prompt('Your answer', '');

        if ($playerAnswer === $answer) {
            line('Correct!');
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$playerName}!");
            return;
        }
    }

    line("Congratulations, $playerName!");
}
