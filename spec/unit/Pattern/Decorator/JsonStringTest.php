<?php
namespace Pattern;

use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    public function testManageToConvertArrayInJson()
    {
        $json = Json::fromArray(['hello' => 'world']);
        $this->assertEquals('{"hello":"world"}', $json->__toString());
    }

    public function testManageToConvertJsonToArray()
    {
        $json = Json::fromString('{"hello":"world"}');
        $this->assertEquals(['hello' => 'world'], $json->toArray());
    }
}
