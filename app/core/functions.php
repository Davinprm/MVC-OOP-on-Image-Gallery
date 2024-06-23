<?php
if (!isset($_SESSION)) {
    session_start();
}

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

function flash($name = '', $message = '', $class = 'form-message form-message-red')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } else if (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : $class;
            echo '<div class="' . $class . '">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function redirect($location)
{
    header("Location: " . ROOT . "$location");
    exit();
}