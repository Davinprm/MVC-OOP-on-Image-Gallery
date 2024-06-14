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