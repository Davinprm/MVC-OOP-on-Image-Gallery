<?php

// make function to print d obj
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    // show url that been executed with splitUrl func
    echo "</pre>";
}

// escaping special char in string
function esc($str)
{
    return addslashes($str);
    // add backslash before each special char in string, to prepare string for using SQL query to prevent injectionn attacks
}

function get_random_string_max($length)
{
    $array = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $text = '';
    $length = rand(4, $length);
    // start length from 4-62

    for ($i = 0; $i < $length; $i++) {
        $text .= $array[rand(0, strlen($array) - 1)];
        // make number between 0-61
    }
    return $text;
}