<?php
require_once 'account.php';

try {
    $account1 = new BankAccount(100);
    $savingsAccount = new SavingsAccount(500);

    echo "Поповнення рахунку на: 500 USD";
    echo "<br>";
    $account1->deposit(500);
    echo "Поточний баланс: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";
    echo "<br>";
    echo "Спроба зняття: 700 USD\n";
    echo "<br>";
    $account1->withdraw(700);
    echo "Баланс: " . $account1->getBalance() . " " . $account1->getCurrency() . "\n";
    echo "<br>";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
    echo "<br>";
}
try {
    echo "<br>";
    echo "Застосування відсотків до накопичувального рахунку\n";
    $savingsAccount = new SavingsAccount(2000, "USD");
    echo "<br>";
    echo "Накопичувальний рахунок, початковий баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "<br>";       
    echo "<br>";
    $savingsAccount->applyInterest();
    echo "Баланс після застосування відсотків: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "\n";
    echo "<br>";
    echo "Спроба зняття: -500 USD\n";
    echo "<br>";
    try {
        $savingsAccount->withdraw(-500);
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "\n";
    }
    echo "<br>";
    echo "Спроба зняття: 800 USD\n";
    echo "<br>";
    try {
        $savingsAccount->withdraw(800);
        echo "Зняття успішне. Баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "\n";
    } catch (Exception $e) {
        echo "Помилка: " . $e->getMessage() . "\n";
    }
    echo "<br>";
    echo "Остаточний баланс: " . $savingsAccount->getBalance() . " " . $savingsAccount->getCurrency() . "\n";

} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
?>
