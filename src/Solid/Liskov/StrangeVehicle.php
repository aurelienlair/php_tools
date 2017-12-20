<?php
namespace Solid;

class StrangeVehicle implements Vehicle
{
    private $properties;

    public function __construct(VehicleProperties $properties)
    {
        $this->properties = $properties;
    }    

    public function getDetails(): string
    {
        return json_encode([
            'colour' => $this->properties->colour,
            'maxSpeed' => $this->properties->maxSpeed . ' MPH',
            'tankCapacity' => $this->properties->tankCapacity
        ]);
    }
}
