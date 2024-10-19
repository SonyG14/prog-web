<?php
$host = 'mysql';
$db = 'users_db';
$user = 'root';
$password = '123';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
