<?php
namespace Solid;

class Client
{
    private $vehiclesRepository;

    public function __construct()
    {
        $this->vehiclesRepository = new VehiclesRepository;
    }

    public function find($vehicleName): Vehicle
    {
        return $this->vehiclesRepository->find($vehicleName);
    }
}
