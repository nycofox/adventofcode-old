<?php

/*
 * Rock     = A X - 1 point
 * Paper    = B Y - 2 points
 * Scissors = C Z - 3 points
 */

$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$score_1 = 0;
$score_2 = 0;

const SCORES_PART_ONE = [
    'A X' => 4, // Tie (3 + 1)
    'A Y' => 8, // Win (6 + 2)
    'A Z' => 3, // Lose (0 + 3)
    'B X' => 1, // Lose (0 + 1)
    'B Y' => 5, // Tie (3 + 2)
    'B Z' => 9, // Win (6 + 3)
    'C X' => 7, // Win (6 + 1)
    'C Y' => 2, // Lose (0 + 2)
    'C Z' => 6, // Tie (3 + 3)
];

const SCORES_PART_TWO = [
    'A X' => 3, // Lose (0 + 3)
    'A Y' => 4, // Tie (3 + 1)
    'A Z' => 8, // Win (6 + 2)
    'B X' => 1, // Lose (0 + 1)
    'B Y' => 5, // Tie (3 + 2)
    'B Z' => 9, // Win (6 + 3)
    'C X' => 2, // Lose (0 + 2)
    'C Y' => 6, // Tie (3 + 3)
    'C Z' => 7, // Win (6 + 1)
];

foreach ($input as $match) {
    $score_1 += SCORES_PART_ONE[$match];
    $score_2 += SCORES_PART_TWO[$match];
}

print_r('Part One - Total score: ' . $score_1 . PHP_EOL);
print_r('Part Two - Total score: ' . $score_2 . PHP_EOL);
