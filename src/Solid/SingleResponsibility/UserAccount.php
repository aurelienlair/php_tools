<?php
namespace Solid;

class UserAccount
{
    private $creditCard;
    private $creditCardAssociation;
    private $balance; 

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
        $this->creditCardAssociation = CreditCardAssociationFactory::from(
            $this->creditCard
        );
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
        return $this->creditCardAssociation->isValid();
    }

    public function creditCardType(): string
    {
        return $this->creditCardAssociation->type();
    }
}
