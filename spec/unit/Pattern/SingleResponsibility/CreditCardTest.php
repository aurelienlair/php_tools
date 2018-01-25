<?php
namespace Pattern;

use PHPUnit\Framework\TestCase;

class CreditCardTest extends TestCase
{
    public function testDefaultValuesAreCorrectHandledByTheValueObject()
    {
        $creditCard = new CreditCard(['number' => 42]);
        $this->assertEquals(
            42,
            $creditCard['number']
        );
        $this->assertEquals(
            'UNKNOWN',
            $creditCard['type']
        );
    }    

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCreditCardIsCorrectValidatedByTheValueObject()
    {
        new CreditCard([
            'number' => 'WRONG_CREDIT_CARD_NUMBER',
            'type' => 42
        ]);
    }    

    /**
     * @expectedException InvalidArgumentException 
     */
    public function testCreditCardCantBeValidWithoutNumber()
    {
        new CreditCard([
            'type' => 'VISA'
        ]);
    }    
}
