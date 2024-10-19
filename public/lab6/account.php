<?php
interface AccountInterface {
    public function deposit($amount);
    public function withdraw($amount);
    public function getBalance();
}

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($initialBalance, $currency = "USD") {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за мінімальний!");
        }
        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення має бути позитивною.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття має бути позитивною.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів на балансі.");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getCurrency() {
        return $this->currency;
    }
}
class SavingsAccount extends BankAccount {
    public static $interestRate = 0.04; // Відсоткова ставка 4%

    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
    }
}
?>
