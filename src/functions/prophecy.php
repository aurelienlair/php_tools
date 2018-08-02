<?php

// Stub + Assertion that should never be called
$myService = static::prophesize(SmsServiceInterface::class);
$myService->send(Argument::any())->shouldNotBeCalled();
$myService = $myService->reveal();


// Custom mock with callback (must return true/false)
$myService = static::prophesize(SomeServiceInterface::class);
$myService
    ->send(
        Argument::that(
            function ($message) use ($expectedObject) {
                return ($message->getFrom() === $expectedObject->getFrom()
                    && $message->getTo() === $expectedObject->getTo()
                    && $message->getText() === $expectedObject->getText()
                );
            }
        )
    )
    ->shouldBeCalledTimes(1);

$myService = $myService->reveal();


// Mock with different assertions
$translator = static::prophesize(TranslatorInterface::class);
$translator
    ->trans(
        Argument::is($parameter1),
        Argument::exact([]),
        Argument::exact('some string'),
        Argument::exact($parameter2)
    )
    ->shouldBeCalledTimes(1)
    ->willReturn($message);
