<?php
namespace Solid;

class CreditCardAssociationFactory
{
    private static $creditCardAssociations=[
        'MASTERCARD' => 'Solid\MasterCardCreditCardAssociation',
        'AMERICAN_EXPRESS' => 'Solid\AmericanExpressCreditCardAssociation',
        'UNKNOWN' => 'Solid\UnknownCreditCardAssociation',
    ];

    public static function from(CreditCard $creditCard)
    {
        return new self::$creditCardAssociations[
            $creditCard['type']
        ]($creditCard);
    }
}
