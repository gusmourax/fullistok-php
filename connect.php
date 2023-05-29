<?php
$hostname = "localhost";
$username = "admin";
$password = "admin";
$database = "estoque";
$row_limit = 8;
$sgbd = 'pgsql'; // mysql, pgsql

// connect to mysql
try {
    $pdo = new PDO($sgbd.":host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    die("Error! " . $err->getMessage());
}
