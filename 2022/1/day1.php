<?php

$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$elves = [];
$rowdata = [];

foreach ($input as $row) {
    if (empty($row)) {
        $elves[] = array_sum($rowdata);
        $rowdata = [];
    }

    $rowdata[] = (int)$row;
}

natsort($elves);

$sorted = array_slice($elves, -3, 3);

print_r('PART ONE: The elf with the most calories has a total of ' . max($elves) . PHP_EOL);
print_r('PART TWO: The three elves with the most calories have a total of ' . array_sum($sorted) . ' calories' . PHP_EOL);
