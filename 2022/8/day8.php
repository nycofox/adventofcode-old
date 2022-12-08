<?php

$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$row = [];
$visible = 0;
$row_count = count($input);
$col_count = strlen($input[0]);

//print_r(sprintf('Input has %d rows and %d columns' . PHP_EOL, $row_count, $col_count));

foreach ($input as $line) {
    $row[] = str_split($line);
}

$x = 1;
while ($x < $row_count-1) {
    $y = 1;
    while ($y < $col_count-1) {
        $surround = getSurround($x,$y);

//        print_r('Position ' . $x . ' ' . $y . ', height ' . $input[$x][$y] . ', max height on any side: ' . $surround . PHP_EOL);

        if($input[$x][$y] > $surround) {
//            print_r('  Visible tree: ' . $x . ' ' . $y . ' Min surround: ' . $surround . PHP_EOL);
            $visible++;
        }
        $y++;
    }
    $x++;
}

function getSurround($x, $y): int
{
    global $row_count;
    global $col_count;
    global $input;

    $left = [];
    $right = [];
    $over = [];
    $under = [];

    // Get columns on row
    $y1 = 0;
    while ($y1 < $col_count) {
        if($y1 < $y) {
            $left[] = $input[$x][$y1];
        } elseif ($y1 > $y) {
            $right[] = $input[$x][$y1];
        }
        $y1++;
    }

    // Get rows on column
    $x1 = 0;
    while ($x1 < $row_count) {
        if($x1 < $x) {
            $over[] = $input[$x1][$y];
        } elseif($x1 > $x) {
            $under[] = $input[$x1][$y];
        }
        $x1++;
    }

    return min(max($left), max($right), max($over), max($under));
}

$visible += ($row_count * 2) + (($col_count - 2) * 2);

print_r('PART One: Visible trees: ' . $visible);
