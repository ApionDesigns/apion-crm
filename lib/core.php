<?php
// (A) ERROR REPORTING
error_reporting(E_ALL & ~E_NOTICE);

// (B) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN
define('DB_HOST', 'localhost');
define('DB_NAME', 'apcrm');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// (C) AUTO FILE PATHS
define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR);

// (D) START SESSION
session_start();

// (E) INIT SYSTEM CORE
require PATH_LIB . "lib-Core.php";
$_CORE = new Core();