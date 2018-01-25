<?php
namespace Pattern;

class CreditCardAssociationFactory
{
    private static $creditCardAssociations=[
        'MASTERCARD' => 'Pattern\MasterCardCreditCardAssociation',
        'AMERICAN_EXPRESS' => 'Pattern\AmericanExpressCreditCardAssociation',
        'UNKNOWN' => 'Pattern\UnknownCreditCardAssociation',
    ];

    public static function from(CreditCard $creditCard)
    {
        return new self::$creditCardAssociations[
            $creditCard['type']
        ]($creditCard);
    }
}
