<?php
namespace Pattern;

class AmericanExpressCreditCardAssociation extends CreditCardAssociation
{
    protected $type='AMERICAN_EXPRESS';  
    protected $regex = "/^(3[47]\d{13})$/";
}
