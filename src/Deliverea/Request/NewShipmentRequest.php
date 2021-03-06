<?php

namespace Deliverea\Request;

use Deliverea\Common\MagicGetAndSetTrait;
use Deliverea\Model\Address;
use Deliverea\Model\Shipment;

class NewShipmentRequest
{
    use MagicGetAndSetTrait;

    public function __construct(Shipment $shipment, Address $from, Address $to)
    {

        foreach (get_object_vars($shipment) as $key => $value) {
            $this->$key = $value;
        }

        $this->from_name = $from->getName();
        $this->from_address = $from->getAddress();
        $this->from_city = $from->getCity();
        $this->from_zip_code = $from->getZipCode();
        $this->from_country_code = $from->getCountryCode();
        $this->from_phone = $from->getPhone();
        $this->from_address_type = $from->getAddressType();
        $this->from_email = $from->getEmail();

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
    }
}