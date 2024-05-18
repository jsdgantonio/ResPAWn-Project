<?php
$host = "localhost";
$port = 3306;
$socket = "";
$user = "root";
$password = "";
$dbname = "respawn_db";

try {
    $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
