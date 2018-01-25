<?php
namespace Pattern;

use PHPUnit\Framework\TestCase;

class SingleResponsibilityTest extends TestCase
{
    public function testABadCreditCardManagementIsNotRespectingSingleResponsibilityPrinciple()
    {
        $godClass = new GodClass(
            CreditCard::fromNumberAndType(5105105105105100, 'AMERICAN_EXPRESS')
        );

        // First responsibility within the same class
        $this->assertTrue(
            $godClass->containsValidCreditCard()
        );

        // Second responsibility within the same class
        $this->assertEquals(
            "MASTERCARD",
            $godClass->creditCardType()
        );

        // Third responsibility within the same class
        $godClass->charge(1000);

        // Fourth responsibility within the same class
        $this->assertEquals(
            'The balance of 5105105105105100 is 1000',
            $godClass->balance()
        );
    }

    public function testAGoodCreditCardManagementIsRespectingSingleResponsibilityPrinciple()
    {
        $creditCard = CreditCard::fromNumberAndType(378282246310005, 'AMERICAN_EXPRESS');
        $creditCardAccount = new CreditCardAccount(
            new UserAccount(
                $creditCard,
                CreditCardAssociationFactory::from(
                    $creditCard
                )
            )
        );
        $this->assertTrue(
            $creditCardAccount->containsValidCreditCard()
        );
        $this->assertEquals(
            "AMERICAN_EXPRESS",
            $creditCardAccount->creditCardType()
        );
        $creditCardAccount->charge(800);
        $this->assertEquals(
            'The balance of 378282246310005 is 1200',
            $creditCardAccount->balance()
        );
    }
}
