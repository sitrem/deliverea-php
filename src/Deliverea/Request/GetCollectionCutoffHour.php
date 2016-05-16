<?php

namespace Deliverea\Request;

class GetCollectionCutoffHour
{
    /** @var string */
    public $carrier_code;

    /** @var string */
    public $country_code;

    /** @var string */
    public $zip_code;

    /** @var array */
    public $custom_carrier_parameters;

    /**
     * GetCollectionCutoffHour constructor.
     * @param $carrierCode
     * @param $countryCode
     * @param $zipCode
     * @param array $customCarrierParameters
     */
    public function __construct($carrierCode, $countryCode, $zipCode, $customCarrierParameters = [])
    {
        $this->carrier_code = $carrierCode;
        $this->country_code = $countryCode;
        $this->zip_code = $zipCode;
        $this->custom_carrier_parameters = $customCarrierParameters;
    }
}