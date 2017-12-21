<?php
namespace Solid;

class UserAccount
{
    private $creditCard;
    private $balance; 

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
        $this->balance = 2000;
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

    public function containsValidCreditCard(CreditCardValidator $validator): bool
    {
        return $validator->isValid($this->creditCard['number']); 
    }

    public function creditCardType(CreditCardTypeDetector $detector): string
    {
        return $detector->type($this->creditCard['number']);
    }
}
