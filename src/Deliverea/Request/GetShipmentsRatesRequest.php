<?php

namespace Deliverea\Request;

use Deliverea\Model\CountryCode;
use Deliverea\Model\ParcelDimensions;
use Deliverea\Model\ParcelWeight;
use Deliverea\Model\ZipCode;

class GetShipmentsRatesRequest
{
    /** @var  CountryCode */
    public $originCountryCode;
    /** @var  ZipCode */
    public $originZipCode;
    /** @var  CountryCode */
    public $destinationCountryCode;
    /** @var  ZipCode */
    public $destinationZipCode;
    /** @var  ParcelDimensions */
    public $dimensions;
    /** @var  ParcelWeight */
    public $weight;

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
        $this->originCountryCode = $originCountryCode;
        $this->originZipCode = $originZipCode;
        $this->destinationCountryCode = $destinationCountryCode;
        $this->destinationZipCode = $destinationZipCode;
        $this->dimensions = $dimensions;
        $this->weight = $weight;
    }
}