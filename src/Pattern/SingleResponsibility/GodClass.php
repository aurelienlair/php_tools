<?php
namespace Pattern;

class GodClass
{
    private $creditCard;
    private $balance;

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
        $this->balance = 2000;
    }

    public function containsValidCreditCard(): bool
    {
        if (preg_match("/^5[1-5]\d{14}$/", $this->creditCard['number'])) {
            return true; 
        }
        return false;
    }

    public function creditCardType(): string
    {
        if (preg_match("/^5[1-5]\d{14}$/", $this->creditCard['number'])) {
            return 'MASTERCARD'; 
        }
        return false;
    }

    public function charge(int $amount): void
    {
        $this->balance -= $amount;
    }

    public function balance(): string
    {
        return "The balance of " 
            . $this->creditCard['number']
            . " is " 
            . $this->balance;
    }
}
