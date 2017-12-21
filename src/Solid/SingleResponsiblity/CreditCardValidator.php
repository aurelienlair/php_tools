<?php
namespace Solid;

class CreditCardValidator
{
    public function isValid(int $number): bool
    {
        if (preg_match("/^(5[1-5]\d{14})|(3[47]\d{13})$/", $number)) {
            return true;
        }

        return false;
    }
}
