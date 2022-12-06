<?php

$input = file_get_contents('input.txt');

$letters = str_split($input);
$markers = [4, 14];

foreach ($markers as $marker) {
    foreach ($letters as $key => $letter) {
        if ($key > $marker) {
            if (count(array_unique(array_slice($letters, $key, $marker))) == $marker) {
                print_r($marker . ' markers: ' . ($key + $marker) . PHP_EOL);
                break;
            }
        }
    }
}
