<?php

namespace Whitecube\MultiSafepay\Entities;

class Order extends Entity {

    public $type;

    public $id;

    public $gateway;

    public $currency;

    public $amount;

    public $description;

    public $payment_options;

    public $customer;

    public function __construct($id, array $data = null)
    {
        parent::__construct($data);

        $this->id($id);
    }

    /**
     * Set the order type
     *
     * @param string $type
     * @return $this
     */
    public function type(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the order ID
     *
     * @param string $id
     * @return $this
     */
    public function id(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the gateway
     *
     * @param string $gateway
     * @return $this
     */
    public function gateway(string $gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * Set the currency
     *
     * @param string $currency
     * @return $this
     */
    public function currency(string $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Set the amount
     *
     * @param float $amount
     * @return $this
     */
    public function amount(string $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set the description
     *
     * @param string $description
     * @return $this
     */
    public function description(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the payment options
     *
     * @param array $payment_options
     * @return $this
     */
    public function payment_options(array $payment_options)
    {
        $this->payment_options = $payment_options;

        return $this;
    }

    /**
     * Set the customer
     *
     * @param array $customer
     * @return $this
     */
    public function customer(array $customer)
    {
        $this->customer = $customer;

        return $this;
    }

}
