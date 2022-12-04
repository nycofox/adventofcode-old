<?php

$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$fully_overlaps = 0;
$partial_overlaps = 0;

foreach ($input as $pair) {
    $elves = explode(',', $pair);

    $elf1 = explode('-', $elves[0]);
    $elf2 = explode('-', $elves[1]);

    if (
        ($elf1[0] >= $elf2[0] && $elf1[1] <= $elf2[1]) ||
        ($elf2[0] >= $elf1[0] && $elf2[1] <= $elf1[1])
    ) {
        $fully_overlaps++;
    }

    if (!($elf1[1] < $elf2[0]) && !($elf2[1] < $elf1[0])) {
        $partial_overlaps++;
    }
}

print_r('Part one - Fully overlaps: ' . $fully_overlaps . PHP_EOL);
print_r('Part one - Partial overlaps: ' . $partial_overlaps . PHP_EOL);
