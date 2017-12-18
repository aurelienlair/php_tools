<?php
namespace Solid;

class VehiclesRepository
{
    private $vehicles=[];

    public function __construct()
    {
        $this->vehicles['Ferrari'] = new Ferrari(new VehicleProperties('red', 220, 86)); 
        $this->vehicles['StrangeVehicle'] = new StrangeVehicle(new VehicleProperties('blue', 402, 391)); 
    }

    public function getDetailsOf($name): string
    {
        return $this->vehicles[$name]->details();
    }
}
