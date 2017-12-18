<?php
namespace Solid;

use PHPUnit\Framework\TestCase;

class LiskovTest extends TestCase
{
    private $vehiclesRepository;

    public function setUp()
    {
        $this->vehiclesRepository = new VehiclesRepository();
    }

    public function testFerrariClassIsRespectingLSP()
    {
        $this->assertEquals(
            json_encode([
                'colour' => 'red',
                'maxSpeed' => 220,
                'tankCapacity' => 86
            ]), 
            $this->vehiclesRepository->getDetailsOf('Ferrari')
        );
    }
    
    public function testStrangeVehicleClassIsNotRespectingLSP()
    {
        $details = json_decode($this->vehiclesRepository->getDetailsOf('StrangeVehicle'), true);
        $this->assertInternalType('int', $details['maxSpeed'], 'StrangeVehicle max speed is supposed to be an integer');
    }
}
