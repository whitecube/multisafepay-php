<?php

namespace Whitecube\MultiSafepay\Api;

class Orders extends Api {

    /**
     * Show order.
     *
     * @param $identifier
     * @return Object|null
     */
    public function fetch($identifier)
    {
        return $this->get('orders/' . rawurlencode($identifier));
    }

    /**
     * Create order.
     *
     * @param array $params
     * @return Object
     */
    public function create(array $params)
    {
        if (!array_key_exists('amount', $params) ||
            !array_key_exists('currency', $params) ||
            !array_key_exists('description', $params) ||
            !array_key_exists('order_id', $params) ||
            !array_key_exists('payment_options', $params) ||
            !array_key_exists('type', $params)
        ) {
            throw new \InvalidArgumentException('Invalid data provided.');
        }

        return $this->post('orders', [], $params);
    }

    /**
     * Update order.
     *
     * @param $identifier
     * @param $data
     * @return mixed
     */
    public function update($identifier, $data)
    {
        return $this->patch('orders/' . rawurlencode($identifier), $data);
    }

}
