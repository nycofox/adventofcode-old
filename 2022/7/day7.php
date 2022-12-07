<?php

$input = file('input-example.txt', FILE_IGNORE_NEW_LINES);

$structure = [];
$folders = [];
$current_directory = '';
$filesize = 0;
$dirtotal = 0;

foreach ($input as $line) {

    $parts = explode(' ', $line);

    if ($parts[0] == '$') {
        print_r('COMMAND: ' . $line . PHP_EOL);
        if ($parts[1] == 'cd') {
            if ($dirtotal > 0) {
                print_r('Total filesize of directory ' . $current_directory . ' was ' . $dirtotal. PHP_EOL);
                if ($dirtotal <= 100000) {
                    $filesize += $dirtotal;
                }
                $dirtotal = 0;
            }
            $cdir = substr($line, 5);
            if ($cdir == '..') {
                $current_directory = substr($current_directory, 0, strrpos($current_directory, '.'));
                print_r('Going up one directory to ' . $current_directory . PHP_EOL);
            } else {
                $current_directory .= '.' . $parts[2];
                print_r('Going into directory ' . $current_directory . PHP_EOL);
            }
        }
    } elseif ($parts[0] == 'dir') {
        print_r('DIRECTORY: ' . $line . PHP_EOL);
    } else {
        print_r('FILE: ' . $line . PHP_EOL);
        $dirtotal += $parts[0];
    }

    print_r('Filesizes: ' . $filesize . PHP_EOL);
}

function change_directory($name)
{

}

function add_filesize()

