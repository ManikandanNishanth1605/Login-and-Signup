<?php

// DSN - data source name

$dsn = "mysql:host=localhost;dbname=firstdatabase";
$dbusername = "root";
$dbpassword = "";

try {
    // PDO - PHP data objects
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection failed: ". $e->getMessage());
}