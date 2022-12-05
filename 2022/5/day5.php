<?php

$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$stack_lines = [];
$instructions = [];
$stacks = [];
$stack_part1 = [];
$stack_part2 = [];

foreach ($input as $instruction) {

    if (str_contains($instruction, 'move')) {
        $instructions[] = getInstruction($instruction);
        continue;
    }

    if (str_contains($instruction, '[')) {
        $stack_lines[] = $instruction;
        continue;
    }

    if (substr($instruction, 1, 1) == '1') {
        $number_of_stacks = count(array_filter(explode(' ', $instruction)));
    }

}

foreach ($stack_lines as $current) {
    $stacks[] = createStackLine($current, $number_of_stacks);
}

foreach ($stacks as $current) {
    $i = 0;

    while ($i < $number_of_stacks) {
        if ($current[$i] <> ' ') {
            $stack_part1[$i + 1][] = $current[$i];
            $stack_part2[$i + 1][] = $current[$i];
        }
        $i++;
    }
}

foreach ($instructions as $instruction) {
    $crates = [];

    $i = 0;
    while ($i < $instruction['amount']) {
        array_unshift($stack_part1[$instruction['to']], $stack_part1[$instruction['from']][0]);
        array_unshift($crates, $stack_part2[$instruction['from']][0]);
        array_shift($stack_part1[$instruction['from']]);
        array_shift($stack_part2[$instruction['from']]);
        $i++;
    }

    $i = 0;
    while ($i < $instruction['amount']) {
        array_unshift($stack_part2[$instruction['to']], $crates[$i]);
        $i++;
    }
}

function getInstruction($string)
{
    $numbers = explode(' ', $string);

    return [
        'amount' => $numbers[1],
        'from' => $numbers[3],
        'to' => $numbers[5],
    ];

}

function createStackLine($input, $number_of_stacks)
{
    $i = 0;

    $line = [];

    while ($i < $number_of_stacks) {
        $line[] = substr($input, ($i * 4) + 1, 1);
        $i++;
    }

    return $line;

}

print_r('Top of each stack (Part One): ');

$i = 1;
while ($i <= $number_of_stacks) {
    print_r($stack_part1[$i][0]);
    $i++;
}

print_r(PHP_EOL . 'Top of each stack (Part Two): ');

$i = 1;
while ($i <= $number_of_stacks) {
    print_r($stack_part2[$i][0]);
    $i++;
}
