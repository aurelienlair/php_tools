<?php
namespace Solid;

class CreditCardAccount
{
    private $userAccount;

    public function __construct(UserAccount $userAccount)
    {
        $this->userAccount = $userAccount;
    }

    public function containsValidCreditCard(): bool
    {
        return $this->userAccount->containsValidCreditCard();
    }

    public function creditCardType(): string
    {
        return $this->userAccount->creditCardType();
    }

    public function charge(int $amount): void
    {
        $this->userAccount->charge($amount);
    }

    public function balance(): string
    {
        return $this->userAccount->balance();
    }
}
