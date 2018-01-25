<?php
namespace Pattern;

final class VehicleProperties
{
     private $colour;
     private $maxSpeed;
     private $tankCapacity;

     public function __construct($colour, $maxSpeed, $tankCapacity)
     {
         $this->colour = $colour;
         $this->maxSpeed = $maxSpeed;
         $this->tankCapacity = $tankCapacity;
     }

     public function __get($name)
     {
        return $this->$name;
     }
}
