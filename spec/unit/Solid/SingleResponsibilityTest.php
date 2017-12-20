<?php
namespace Solid;

use PHPUnit\Framework\TestCase;

class SingleResponsibilityTest extends TestCase
{
    public function testABadCreditCardManagementIsNotRespectingSingleResponsibilityPrinciple()
    {
        $badCreditCardManagementSystem = new BadCreditCardManagementSystem(
            CreditCard::fromNumber(5105105105105100)
        );

        // First responsibility within the same class
        $this->assertTrue(
            $badCreditCardManagementSystem->containsValidCreditCard()
        );

        // Second responsibility within the same class
        $this->assertEquals(
            "MASTERCARD",
            $badCreditCardManagementSystem->creditCardType()
        );

        // Third responsibility within the same class
        $badCreditCardManagementSystem->charge(1000);

        // Fourth responsibility within the same class
        $this->assertEquals(
            'The balance of 5105105105105100 is 1000',
            $badCreditCardManagementSystem->balance()
        );
    }

    public function testAGoodCreditCardManagementIsRespectingSingleResponsibilityPrinciple()
    {
        $goodCreditCardManagementSystem = new GoodCreditCardManagementSystem(
            new UserAccount(CreditCard::fromNumber(378282246310005, 'AMERICAN_EXPRESS'))
        );
        $this->assertTrue(
            $goodCreditCardManagementSystem->containsValidCreditCard()
        );
        $this->assertEquals(
            "AMERICAN_EXPRESS",
            $goodCreditCardManagementSystem->creditCardType()
        );
        $goodCreditCardManagementSystem->charge(800);
        $this->assertEquals(
            'The balance of 378282246310005 is 1200',
            $goodCreditCardManagementSystem->balance()
        );
    }
}
