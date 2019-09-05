<?php

namespace Whitecube\MultiSafepay\Entities;

class Entity {

    public function __construct($data = [])
    {
        $this->extractData($data);
    }

    protected function extractData($data)
    {
        foreach($data as $key => $value) {
            if(method_exists($this, $key)) {
                $this->$key($value);
                continue;
            }

            if(!property_exists($this, $key)) continue;

            $this->$key = $value;
        }
    }

}
