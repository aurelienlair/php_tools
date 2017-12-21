<?php
namespace Solid;

class GoodCreditCardManagementSystem
{
    private $userAccount;

    public function __construct(UserAccount $userAccount)
    {
        $this->userAccount = $userAccount;
    }

    public function containsValidCreditCard(): bool
    {
        return $this->userAccount->containsValidCreditCard(new CreditCardValidator);
    }

    public function creditCardType(): string
    {
        return $this->userAccount->creditCardType(new CreditCardTypeDetector);
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
