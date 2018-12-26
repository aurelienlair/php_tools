<?php
namespace Pattern;

class BillNote implements Note
{
    private $id;
    private $account;
    private $paymentMethodState;

    public function __construct(array $parameters)
    {
        if (!isset($parameters['id'])) {
            $this->id = hash('md5', json_encode($parameters));
        } else {
            $this->id = $parameters['id']; 
        }
        $this->account= $parameters['account'];
        $this->paymentMethodState = $parameters['paymentMethodState'];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'account' => $this->account,
            'paymentMethodState' => $this->paymentMethodState, 
        ];
    }

    public function id(): string
    {
        return $this->id;
    }
}
