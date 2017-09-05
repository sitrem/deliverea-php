<?php

namespace Deliverea\Request;


use Deliverea\Model\CountryCode;
use Deliverea\Model\ZipCode;

class GetShipmentTimeArrivalEstimationRequest
{
    /** @var $from_zip_code */
    public $from_zip_code;

    /** @var $from_country_code */
    public $from_country_code;

    /** @var $to_zip_code */
    public $to_zip_code;

    /** @var $to_country_code */
    public $to_country_code;

    /** @var $shipping_date */
    public $shipping_date;

    /**
     * @param CountryCode $originCountryCode
     * @param ZipCode $originZipCode
     * @param CountryCode $destinationCountryCode
     * @param ZipCode $destinationZipCode
     * @param $shippingDate
     */
    public function __construct(
        CountryCode $originCountryCode,
        ZipCode $originZipCode,
        CountryCode $destinationCountryCode,
        ZipCode $destinationZipCode,
        $shippingDate
    )
    {
        $this->from_country_code = $originCountryCode->getCountryCode();
        $this->from_zip_code = $originZipCode->getZipCode();
        $this->to_country_code = $destinationCountryCode->getCountryCode();
        $this->to_zip_code = $destinationZipCode->getZipCode();
        $this->shipping_date = $shippingDate;
    }
}