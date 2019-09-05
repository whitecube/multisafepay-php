<?php

namespace Whitecube\MultiSafepay\Api;

class Issuers extends Api {

    /**
     * Get all issuers for the specified gateway.
     *
     * @param $gatewayId
     * @return array
     */
    public function all($gatewayId)
    {
        return $this->get('/issuers/' . rawurlencode($gatewayId));
    }

}
