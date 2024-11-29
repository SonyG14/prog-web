<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}

$userId = $_SESSION['id']; 
$conn = mysqli_connect("mysql", "root", "123", "lab_7");
if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}


// Отримання поточних даних користувача
$sql = "SELECT username, email FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $username, $email);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['username'] = $username;
}

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: login.html");
    exit();
}

// Зміна імені
if (isset($_POST["save_name"])) {
    $name = trim($_POST["name"]);
    if (!empty($name)) {
        $sql = "UPDATE users SET username = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $name, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: account.php");
        exit();
    } else {
        echo "Ім'я не може бути порожнім!";
    }
}

// Зміна email
if (isset($_POST["save_email"])) {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "UPDATE users SET email = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $email, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: account.php");
        exit();
    } else {
        echo "Невірний формат електронної пошти!";
    }
}

// Зміна пароля
if (isset($_POST["save_password"])) {
    $password = trim($_POST["password"]);
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $hashed_password, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: account.php");
        exit();
    } else {
        echo "Пароль не може бути порожнім!";
    }
}

mysqli_close($conn);
?>
