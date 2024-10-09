<?php   //Відкриття PHP-тегу
    // Пункт 1
    echo "Hello, world!";    // Використовую функцію echo для виведення Hello, world! на екран
    
    // Пункт 2
    $line = "it's not a very long string";
    $number = 2005;
    $float = 3.14;
    $boolean = true;

    echo "<br>" . $line . "<br>";
    echo $number . "<br>";
    echo $float . "<br>";
    echo $boolean . "<br>";

    echo "Тип і значення line: ";
    var_dump($line);

    echo "<br>Тип і значення number: ";
    var_dump($number);

    echo "<br>Тип і значення float: ";
    var_dump($float);

    echo "<br>Тип і значення boolean: ";
    var_dump($boolean);
    
    // Пункт 3
    $string1 = "<br>Let it go, let it go";
    $string2 = "I am one with the wind and sky";

    $combinedString = $string1 . ", " . $string2 . "!";
    echo $combinedString;
    
    // Пункт 4
    $number1 = 19;

    if ($number1 % 2 == 0) {
        echo "<br>Число $number1 є парним.";
    } else {
        echo "<br>Число $number1 є непарним.". "<br>";
    }
    
    // Пункт 5
    for ($i = 1; $i <= 10; $i++) {
        echo $i . " "; // Виведення числа з пробілом для розділення
    }
    echo "<br>";

    $j = 10;

    while ($j >= 1) {
        echo $j . " "; 
        $j--; 
    }
    echo "<br>";
    
    // Пункт 6
    $student = [
        "ім'я" => "Петр",
        "прізвище" => "Петренко",
        "вік" => 18,
        "спеціальність" => "Комп'ютерні науки"
    ];
    
    echo "<br>Ім'я: " . $student["ім'я"] . "<br>";
    echo "Прізвище: " . $student["прізвище"] . "<br>";
    echo "Вік: " . $student["вік"] . "<br>";
    echo "Спеціальність: " . $student["спеціальність"] . "<br>";
    
    $student["середній бал"] = 4.2;
    
    echo "<br>Оновлена інформація про студента:<br>";
    foreach ($student as $key => $value) {
        echo ucfirst($key) . ": " . $value . "<br>";
    }

?>
