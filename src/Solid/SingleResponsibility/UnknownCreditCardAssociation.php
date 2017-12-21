<?php
namespace Solid;

class UnknownCreditCardAssociation extends CreditCardAssociation
{
    protected $type='UNKNOWN';  

    public function isValid(): bool
    {
        return false;
    }
}
