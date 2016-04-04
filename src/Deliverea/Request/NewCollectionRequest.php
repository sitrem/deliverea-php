<?php

namespace Deliverea\Request;

use Deliverea\Model\Address;
use Deliverea\Model\Collection;
use Deliverea\Model\Shipment;

class NewCollectionRequest
{
    /** @var string */
    public $collection_date;

    /** @var string */
    public $carrier_code;

    /** @var string */
    public $service_code;

    /** @var string */
    public $collection_client_ref;

    /** @var string */
    public $hour_start_1;

    /** @var string */
    public $hour_end_1;

    /** @var string H:i */
    public $hour_start_2;

    /** @var string H:i */
    public $hour_end_2;

    /** @var */
    public $cash_on_delivery;

    /** @var int */
    public $from_address_id;

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

    public function __construct(Collection $collection, $from_address_id, Address $to)
    {
        $this->collection_date = $collection->getCollectionDate()->format('Y-m-d');
        $this->carrier_code = $collection->getCarrierCode();
        $this->service_code = $collection->getServiceCode();
        $this->collection_client_ref = $collection->getCollectionClientRef();
        $this->hour_start_1 = $collection->getHourStart1();
        $this->hour_end_1 = $collection->getHourEnd1();
        $this->hour_start_2 = $collection->getHourStart2();
        $this->hour_end_2 = $collection->getHourEnd2();
        $this->cash_on_delivery = $collection->getCashOnDelivery();
        $this->from_address_id = $from_address_id;
        $this->to_nif = $to->getNif();
        $this->to_name = $to->getName();
        $this->to_attn = $to->getAttn();

        if ($to->getAddress()) {
            $this->to_address = $to->getAddress();
        } else {
            $this->to_street_type = $to->getStreetType();
            $this->to_street_name = $to->getStreetName();
            $this->to_street_number = $to->getStreetNumber();
            $this->to_floor = $to->getFloor();
        }

        $this->to_city = $to->getCity();
        $this->to_zip_code = $to->getZipCode();
        $this->to_country_code = $to->getCountryCode();
        $this->to_phone = $to->getPhone();
        $this->to_email = $to->getEmail();
        $this->to_observations = $to->getObservations();
    }
}