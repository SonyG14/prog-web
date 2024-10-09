<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);

    // Функція для перевірки, чи є рядок буквенним 
    function isValidString($str) {
        return preg_match("/^[\p{L}']+$/u", $str);
    }

    if (empty($name) || empty($surname)) {
        echo "Будь ласка, заповніть всі поля форми!<br><br>";

        include 'form.php'; 
    } else {
        if (isValidString($name) && isValidString($surname)) {
            echo "Привіт, " . htmlspecialchars($name) . " " . htmlspecialchars($surname) . "!";
        } else {
            echo "Ім'я та прізвище повинні містити лише літери.";
        }
    }
} else {
    echo "Дані не отримано.";
}
?>
