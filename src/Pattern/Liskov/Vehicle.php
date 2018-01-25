<?php
namespace Pattern;

interface Vehicle
{
    public function __construct(VehicleProperties $properties);

    /**
     * @return string 
     */
    public function getDetails(): string;
}
