<?php
namespace Pattern;

class UnknownCreditCardAssociation extends CreditCardAssociation
{
    protected $type='UNKNOWN';  

    public function isValid(): bool
    {
        return false;
    }
}
