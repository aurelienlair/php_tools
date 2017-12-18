<?php
namespace Solid;

class Ferrari implements Vehicle
{
    private $properties;

    public function __construct(VehicleProperties $properties)
    {
        $this->properties = $properties;
    }    

    public function details(): string
    {
        return json_encode([
            'colour' => $this->properties->colour,
            'maxSpeed' => $this->properties->maxSpeed,
            'tankCapacity' => $this->properties->tankCapacity
        ]);
    }
}
