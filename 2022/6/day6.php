<?php

$input = file_get_contents('input.txt');

$letters = str_split($input);
$markers = [4, 14];

foreach ($letters as $key => $letter) {
    foreach ($markers as $marker) {
        if ($key > $marker) {
            $array = array_slice($letters, $key, $marker);

            if (count(array_unique($array)) == $marker) {
                print_r($marker . ' markers: ' . ($key + $marker) . PHP_EOL);
                break;
            }
        }
    }

}