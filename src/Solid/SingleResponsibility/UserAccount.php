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

    public function containsValidCreditCard(): bool
    {
        return CreditCardAssociationFactory::from(
            $this->creditCard
        )->isValid();
    }

    public function creditCardType(): string
    {
        return CreditCardAssociationFactory::from(
            $this->creditCard
        )->type();
    }
}
