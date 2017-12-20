<?php
namespace Solid;

class ValueObject extends \ArrayObject
{   
    protected $mandatoryKeys = []; 
    protected $allowedKeys = []; 
    protected $allowedValues = []; 
    protected $defaultValues = []; 
    protected $instanceTypes = []; 
    protected $scalarTypes = []; 

    public function __construct(array $data = [])
    {
        $data = $this->assignDefaultValuesIfNecessary($data);

        $this->checkMandatoryKeys($data);

        foreach (array_keys($data) as $key) {
            $this->checkIfKeyIsAllowed($key);
            $this->checkIfValueTypeIsAllowedForKey($key, $data);
            $this->checkIfValueTypeIsAnAllowedInstanceForKey($key, $data);
            $this->checkIfValueIsAllowedForKey($key, $data);
        }

        parent::__construct($data);
    } 

    private function assignDefaultValuesIfNecessary(array $data)
    {
        foreach ($this->defaultValues as $key => $value) {
            if (!isset($data[$key])) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    private function checkMandatoryKeys(array $data)
    {
        $missingKeys = array_diff($this->mandatoryKeys, array_keys($data));

        if ($missingKeys) {
            throw new \InvalidArgumentException(
                'Missing mandatory fields for ' . get_class($this) . ' : ' . implode(', ', $missingKeys)
            );
        }
    }

    private function checkIfKeyIsAllowed($key)
    {
        if (!in_array($key, $this->allowedKeys)) {
            throw new \BadFunctionCallException(
                "`{$key}` is not a valid field in: " . get_class($this)
            );
        }
    }

    private function checkIfValueTypeIsAnAllowedInstanceForKey($key, array $data)
    {
        if (isset($this->instanceTypes[$key]) && isset($data[$key])) {
            if (!($data[$key] instanceof $this->instanceTypes[$key])) {
                throw new \InvalidArgumentException(
                    "`{$key}` type must be an instance of `{$this->instanceTypes[$key]}` in " 
                        . get_class($this)
                );
            }
        }
    }

    private function checkIfValueTypeIsAllowedForKey($key, array $data)
    {
        if (isset($this->scalarTypes[$key]) && isset($data[$key])) {
            if (!($this->scalarTypes[$key] === gettype($data[$key]))) {
                throw new \InvalidArgumentException(
                    "`{$key}` type must be a `{$this->scalarTypes[$key]}` in " 
                        . get_class($this)
                        . ', given => ' . gettype($data[$key])
                );
            }
        }
    }

    private function checkIfValueIsAllowedForKey($key, array $data)
    {
        if (isset($this->allowedValues[$key])) {
            if (!in_array($data[$key], $this->allowedValues[$key])) {
                throw new \InvalidArgumentException(
                    "value for `" 
                        . $key 
                        . "` field in " 
                        . get_class($this) 
                        . " must be one of: `" 
                        . implode($this->allowedValues[$key], ', ') 
                        . "` got `{$data[$key]}`"
                );
            }
        }
    }
}
