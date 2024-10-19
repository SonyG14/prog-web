<?php
session_start();
require 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $sql = "SELECT id, username, password FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['username'] = $username; 
        header("Location: welcome.php"); 
        exit();
    } else {
        echo "Invalid username or password!";
    }

    $stmt->close();
    $conn->close();
}
?>
