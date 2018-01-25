<?php
namespace Pattern;

class VehiclesRepository
{
    private $vehicles=[];

    public function __construct()
    {
        $this->vehicles['Ferrari'] = new Ferrari(new VehicleProperties('red', 220, 86)); 
        $this->vehicles['StrangeVehicle'] = new StrangeVehicle(new VehicleProperties('blue', 402, 391)); 
    }

    public function find($name): Vehicle 
    {
        if (array_key_exists($name, $this->vehicles)) {
            return $this->vehicles[$name];
        }

        throw new \RuntimeException("Vehicle {$name} has not been found in the repository");
    }
}
