<?php
// define has no scope, it's universal, with first param as a constant name n second param is a val
// DB
define('DB_HOST', 'localhost:4306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'catalog_db');

define ('WEBSITE_TITLE', "Gallery Image");
// define d website title

// root paths
$path = str_replace("\\", "/", "http://" . $_SERVER['SERVER_NAME'] . __DIR__ . "/");
// show detail source directory path and replace "\\" with "/" as d third param is d subj string
// window has a backslash for url as a first param of replace

$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
// removing doc root path "C:/XAMPP/htdocs" with empty array

define('ROOT', str_replace("app/core", "public", $path));
// defining with "ROOT" as d name // replacing string with another string as first param is obj that want to replace  // replace string with "public" string in second param //third param is subj that want to be replaced

define('ASSETS', str_replace("app/core", "public/assets", $path));
// replace first param with second param with third param as d subj