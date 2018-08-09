<?php

// STUB
$stub = $this->createMock('Toto');
$stub->expects($this->any())
    ->method('titi')
    ->will($this->returnValue(42));

// MOCK DISABLING CONSTRUCT
$mock = $this->getMockBuilder('class_name')
        ->disableOriginalConstructor()
            ->getMock();

// PARTIAL MOCKS
$emailService = $this->createPartialMock(
    EmailService::class,
    ['sendMessage']
);


// Expected exception annotation
use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    /**
     * @expectedException RuntimeException
     */
    public function testBlaBlaBla()
    {
        // Do stuff...
    }

    /**
     * @dataProvider sampleProvider
     */
    public function testProviderIsHandledCorrectly($expectedNumber, $expectedString)
    {
        $this->assertEquals($expectedNumber, $response->number());
        $this->assertEquals($expectedString, $response->string());
    }

    public static function sampleProvider(): array
    {
        return [
            ['01234', 'abcde'],
            ['56789', 'fghij'],
        ];
    }
}
