<?php
namespace Solid;

final class CreditCard extends ValueObject
{   
    protected $mandatoryKeys = [
        'number'
    ];

    protected $allowedKeys = [
        'number',
        'type',
    ];

    protected $defaultValues = [
        'type' => 'UNKNOWN',
    ];

    protected $scalarTypes = [
        'number' => 'integer',
        'type' => 'string',
    ];

    public function __construct(array $data=[])
    {
        parent::__construct($data);
    }

    public static function fromNumber($number)
    { 
        return new self(['number' => $number]);
    }
}
