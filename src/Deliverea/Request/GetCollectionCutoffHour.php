<?php

namespace Deliverea\Request;

class GetCollectionCutoffHour
{
    /** @var string */
    public $carrier_code;

    /** @var int */
    public $from_address_id;

    /**
     * @param $carrierCode
     * @param $fromAddressId
     */
    public function __construct($carrierCode, $fromAddressId)
    {
        $this->carrier_code = $carrierCode;
        $this->from_address_id = $fromAddressId;
    }
}