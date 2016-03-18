<?php

// STUB
$stub = $this->getMock('Toto');
$stub->expects($this->any())
    ->method('titi')
    ->will($this->returnValue(42));

// MOCK DISABLING CONSTRUCT
$mock = $this->getMockBuilder('class_name')
        ->disableOriginalConstructor()
            ->getMock();
