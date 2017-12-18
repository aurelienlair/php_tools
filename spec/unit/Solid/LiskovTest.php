<?php
namespace Solid;

use PHPUnit\Framework\TestCase;

class LiskovTest extends TestCase
{
    private $vehiclesRepository;

    public function setUp()
    {
        $this->client = new Client();
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
            $this->client->find('Ferrari')->getDetails()
        );
    }

    public function testStrangeVehicleClassIsNotRespectingLSP()
    {
        $details = json_decode($this->client->find('StrangeVehicle')->getDetails(), true);
        $this->assertInternalType(
            'int', 
            $details['maxSpeed'],
            'StrangeVehicle max speed is supposed to be an integer => it violates LSP'
        );
    }

    /**
     * @expectedException RuntimeException
     */
    public function testWhenLookingForAnUnknownVehicleAnExceptionIsThrown()
    {
        $this->client->find('UFO')->getDetails();
    }
}
