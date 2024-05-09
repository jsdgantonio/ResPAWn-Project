<?php
$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "";
$dbname = "respawn_db";

try {
    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "SUP CUH CONNECTION SUCCESFUL !";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

/*
try {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}*/

?>