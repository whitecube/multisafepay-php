<?php

namespace Whitecube\MultiSafepay\Api;

class Gateways extends Api {

    /**
     * Get all gateways.
     *
     * @param string|null $country
     * @param string|null $currency
     * @param int|null    $amount
     * @return array
     */
    public function all($country = null, $currency = null, $amount = null)
    {
        $attributes = array_filter(
            compact('country', 'currency', 'amount')
        );
        return $this->get('/gateways', $attributes);
    }
    /**
     * Show gateway.
     *
     * @param $identifier
     * @return Object|null
     */
    public function show($identifier)
    {
        return $this->get('/gateways/' . rawurlencode($identifier));
    }

}
