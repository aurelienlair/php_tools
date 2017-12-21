<?php
namespace Solid;

class CreditCardAssociation
{
    protected $creditCard;
    protected $regex;
    protected $type;

    public function __construct(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
    }

    public function isValid(): bool
    {
        if (preg_match($this->regex, $this->creditCard['number'])) {
            return true;
        }

        return false;
    }

    public function type()
    {
        return $this->type; 
    }    
}
