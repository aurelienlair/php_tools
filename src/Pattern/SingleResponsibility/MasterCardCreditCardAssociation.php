<?php
namespace Pattern;

class MasterCardCreditCardAssociation extends CreditCardAssociation
{
    protected $type='MASTERCARD';  
    protected $regex = "/^(5[1-5]\d{14})$/";
}
