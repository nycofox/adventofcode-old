<?php

$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$sum = 0;

foreach ($input as $rucksack) {
    $compartment_1 = substr($rucksack, 0, strlen($rucksack) / 2);
    $compartment_2 = substr($rucksack, strlen($rucksack) / 2);

    $letters_1 = str_split($compartment_1);
    $letters_2 = str_split($compartment_2);

    $common = implode(array_unique(array_intersect($letters_1, $letters_2)));

    $sum += lettervalue($common);
}

print_r('Part one - Sum of priorities: ' . $sum);

function lettervalue($letter) {
    if (ctype_lower($letter)) {
        return ord($letter) - 96;
    }

    return ord($letter) - 38;
}