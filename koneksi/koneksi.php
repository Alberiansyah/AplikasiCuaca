<?php

require __DIR__ . "/../medoo2.php";

$host = "localhost";
$dbname = "metpen_cuaca";
$user   = "root";
$pass   = "";

use Medoo\Medoo;

$db = new Medoo([
    // [required]
    'type' => 'mysql',
    'host' => $host,
    'database' => $dbname,
    'username' => $user,
    'password' => $pass,

    // [optional]
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'port' => 3306,

    // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
    'prefix' => 'PREFIX_',

    // [optional] To enable logging. It is disabled by default for better performance.
    'logging' => true,

    // [optional]
    // Error mode
    // Error handling strategies when the error has occurred.
    // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
    // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
    'error' => PDO::ERRMODE_WARNING,

    // [optional]
    // The driver_option for connection.
    // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ],

    // [optional] Medoo will execute those commands after the database is connected.
    'command' => [
        'SET SQL_MODE=ANSI_QUOTES'
    ]
]);

$hostToRoot = 'http://localhost/UNIKOM/MetodePenelitian/AplikasiCuaca/';
$title = 'MetPen | Aplikasi Cuaca';
$version = 'Beta Build 1.0 (Bug are expected)';

session_start();
