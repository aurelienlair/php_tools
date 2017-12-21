<?php
namespace Solid;

class CreditCardTypeDetector
{
    public function type(int $number): string
    {
        if (preg_match("/^5[1-5]\d{14}$/", $number)) {
            return 'MASTERCARD';
        }

        if (preg_match("/^3[47]\d{13}$/", $number)) { 
            return 'AMERICAN_EXPRESS';
    
        }
        return 'UNKNOWN';
    }
}
