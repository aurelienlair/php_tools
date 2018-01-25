<?php
namespace Pattern;

final class CreditCard extends ValueObject
{   
    protected $mandatoryKeys = [
        'number'
    ];

    protected $allowedKeys = [
        'number',
        'type',
    ];

    protected $allowedValues = [
        'type' => [
            'MASTERCARD',
            'AMERICAN_EXPRESS',
            'UNKNOWN',
        ]
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

    public static function fromNumberAndType($number, $type): ValueObject
    { 
        return new self([
            'number' => $number,
            'type' => $type
        ]);
    }
}
