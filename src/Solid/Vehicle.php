<?php
namespace Solid;

interface Vehicle
{
    public function __construct(VehicleProperties $properties);

    /**
     * @return json
     */
    public function details();
}
