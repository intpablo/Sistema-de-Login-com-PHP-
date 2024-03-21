<?php

$host = 'localhost';
$dbname = 'firstdb';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //Throwable $th
    //throw $th;
    die("Connection failed: " . $e->getMessage());
}