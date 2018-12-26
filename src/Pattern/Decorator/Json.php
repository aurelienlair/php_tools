<?php
namespace Pattern;

class Json
{
    private $string;

    private function __construct(string $string)
    {
        $this->string = $string;
    }

    public static function fromArray(array $array)
    {
        return new self(json_encode($array));
    }

    public static function fromString(string $string)
    {
        return new self($string);
    }

    public function __toString()
    {
        return $this->string;
    }

    public function toArray()
    {
        return json_decode($this->string, true);
    }
}
