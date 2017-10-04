<?php

namespace Deliverea\Request;

use Deliverea\Model\CountryCode;
use Deliverea\Model\ParcelDimensions;
use Deliverea\Model\ParcelWeight;
use Deliverea\Model\ZipCode;

class GetShipmentsRatesRequest
{
    /** @var  CountryCode */
    public $from_country_code;
    /** @var  ZipCode */
    public $from_zip_code;
    /** @var  CountryCode */
    public $to_country_code;
    /** @var  ZipCode */
    public $to_zip_code;
    /** @var array */
    public $parcels;

    /**
     * GetShipmentsRatesRequest constructor.
     * @param CountryCode $originCountryCode
     * @param ZipCode $originZipCode
     * @param CountryCode $destinationCountryCode
     * @param ZipCode $destinationZipCode
     * @param ParcelDimensions $dimensions
     * @param ParcelWeight $weight
     */
    public function __construct(
        CountryCode $originCountryCode,
        ZipCode $originZipCode,
        CountryCode $destinationCountryCode,
        ZipCode $destinationZipCode,
        ParcelDimensions $dimensions,
        ParcelWeight $weight
    ) {
        $this->from_country_code = $originCountryCode->getCountryCode();
        $this->from_zip_code = $originZipCode->getZipCode();
        $this->to_country_code = $destinationCountryCode->getCountryCode();
        $this->to_zip_code = $destinationZipCode->getZipCode();
        $this->parcels[0]['parcel_weight'] = $weight->getWeight();
        $this->parcels[0]['parcel_width'] = $dimensions->getWidth();
        $this->parcels[0]['parcel_height'] = $dimensions->getHeight();
        $this->parcels[0]['parcel_length'] = $dimensions->getLength();
        $this->parcels[0]['parcel_volume'] = $dimensions->getVolume();
    }
}