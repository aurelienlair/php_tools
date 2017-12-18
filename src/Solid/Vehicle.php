<?php
namespace Solid;

interface Vehicle
{
    public function __construct(VehicleProperties $properties);

    /**
     * @return string 
     */
    public function details(): string;
}
