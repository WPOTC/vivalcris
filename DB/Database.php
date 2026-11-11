<?php

$host = "localhost";
$database = "vivalcris";
$username = "root";
$password = "";

try{
    $pdo = new PDO(
        "mysql:host=$host;
         dbname=$database;
         charset=utf8mb4",
         $username,
         $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
} catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}

function getPDOConnection(){
    global $pdo;
    return $pdo;
}

?>