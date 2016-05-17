<?php

namespace Deliverea\Request;

use Deliverea\Model\Address;
use Deliverea\Model\Shipment;

class NewShipmentRequest
{
    /** @var int */
    public $parcel_number;

    /** @var int */
    public $parcel_weight;

    /** @var int */
    public $parcel_height;

    /** @var int */
    public $parcel_width;

    /** @var int */
    public $parcel_length;

    /** @var int */
    public $parcel_volume;

    /** @var string */
    public $shipping_date;

    /** @var string */
    public $service_type;

    /** @var string */
    public $carrier_code;

    /** @var string */
    public $service_code;

    /** @var string */
    public $shipping_client_ref;

    /** @var int */
    public $docs_number;

    /** @var */
    public $cash_on_delivery;

    /** @var string */
    public $from_name;

    /** @var string */
    public $from_city;

    /** @var string */
    public $from_country_code;

    /** @var string */
    public $from_phone;

    /** @var string */
    public $from_zip_code;

    /** @var string */
    public $to_nif;

    /** @var string */
    public $to_name;

    /** @var string */
    public $to_attn;

    /** @var string */
    public $to_street_type;

    /** @var string */
    public $to_street_name;

    /** @var string */
    public $to_street_number;

    /** @var string */
    public $to_floor;

    /** @var string */
    public $to_address;

    /** @var string */
    public $to_city;

    /** @var string */
    public $to_zip_code;

    /** @var string */
    public $to_country_code;

    /** @var string */
    public $to_phone;

    /** @var string */
    public $to_email;

    /** @var string */
    public $to_observations;

    /** @var string */
    public $return_dlvr_ref;

    /** @var bool */
    public $is_return;

    /** @var array */
    public $custom_carrier_parameters;

    public function __construct(Shipment $shipment, Address $from, Address $to)
    {
        $this->parcel_number = $shipment->getParcelNumber();
        $this->parcel_weight = $shipment->getParcelWeight();
        $this->parcel_height = $shipment->getParcelHeight();
        $this->parcel_width = $shipment->getParcelWidth();
        $this->parcel_length = $shipment->getParcelLength();
        $this->parcel_volume = $shipment->getParcelVolume();
        $this->shipping_date = $shipment->getShippingDate()->format('Y-m-d');
        $this->service_type = $shipment->getServiceType();
        $this->carrier_code = $shipment->getCarrierCode();
        $this->service_code = $shipment->getServiceCode();
        $this->shipping_client_ref = $shipment->getShippingClientRef();
        $this->docs_number = $shipment->getDocsNumber();
        $this->cash_on_delivery = $shipment->getCashOnDelivery();
        $this->is_return = intval($shipment->getIsReturn());
        $this->return_dlvr_ref = $shipment->getReturnDlvrRef();

        $this->from_name = $from->getName();
        $this->from_address = $from->getAddress();
        $this->from_city = $from->getCity();
        $this->from_zip_code = $from->getZipCode();
        $this->from_country_code = $from->getCountryCode();
        $this->from_phone = $from->getPhone();

        $this->to_nif = $to->getNif();
        $this->to_name = $to->getName();
        $this->to_attn = $to->getAttn();
        $this->to_address = $to->getAddress();
        $this->to_city = $to->getCity();
        $this->to_zip_code = $to->getZipCode();
        $this->to_country_code = $to->getCountryCode();
        $this->to_phone = $to->getPhone();
        $this->to_email = $to->getEmail();
        $this->to_observations = $to->getObservations();

        $this->custom_carrier_parameters = $shipment->getCustomCarrierParameters();
    }
}