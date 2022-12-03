<?php

$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$sum_1 = 0;
$sum_2 = 0;

foreach ($input as $rucksack) {
    $letters_1 = str_split(substr($rucksack, 0, strlen($rucksack) / 2));
    $letters_2 = str_split(substr($rucksack, strlen($rucksack) / 2));

    $common = implode(array_unique(array_intersect($letters_1, $letters_2)));

    $sum_1 += lettervalue($common);
}

$groups = array_chunk($input, 3);

foreach ($groups as $group) {
    $common = implode(array_unique(array_intersect(str_split($group[0]), str_split($group[1]), str_split($group[2]))));

    $sum_2 += lettervalue($common);
}

print_r('Part one - Sum of priorities: ' . $sum_1 . PHP_EOL);
print_r('Part two - Sum of priorities: ' . $sum_2 . PHP_EOL);

function lettervalue($letter)
{
    if (ctype_lower($letter)) {
        return ord($letter) - 96;
    }

    return ord($letter) - 38;
}
