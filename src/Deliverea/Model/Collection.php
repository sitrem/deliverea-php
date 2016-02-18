<?php
namespace Deliverea\Model;

use Deliverea\Common\ToArrayTrait;

class Collection extends AbstractDeliverea
{
    use ToArrayTrait;

    /** @var \DateTime */
    private $collection_date;

    /** @var string */
    private $carrier_code;

    /** @var string */
    private $service_code;

    /** @var string */
    private $collection_client_ref;

    /** @var string */
    private $hour_start_1;

    /** @var string */
    private $hour_end_1;

    /** @var string H:i */
    private $hour_start_2;

    /** @var string H:i */
    private $hour_end_2;

    /**
     * @param $collection_client_ref
     * @param \DateTime $collection_date
     * @param $carrier_code
     * @param $service_code
     * @param $hour_start_1
     * @param $hour_end_1
     */
    public function __construct(
        $collection_client_ref,
        \DateTime $collection_date,
        $carrier_code,
        $service_code,
        $hour_start_1,
        $hour_end_1
    ) {
        $this->collection_client_ref = $collection_client_ref;
        $this->collection_date = $collection_date;
        $this->carrier_code = $carrier_code;
        $this->service_code = $service_code;
        $this->hour_start_1 = $hour_start_1;
        $this->hour_end_1 = $hour_end_1;
    }

    /**
     * @return \DateTime
     */
    public function getCollectionDate()
    {
        return $this->collection_date;
    }

    /**
     * @param \DateTime $collection_date
     */
    public function setCollectionDate($collection_date)
    {
        $this->collection_date = $collection_date;
    }

    /**
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->carrier_code;
    }

    /**
     * @param string $carrier_code
     */
    public function setCarrierCode($carrier_code)
    {
        $this->carrier_code = $carrier_code;
    }

    /**
     * @return string
     */
    public function getServiceCode()
    {
        return $this->service_code;
    }

    /**
     * @param string $service_code
     */
    public function setServiceCode($service_code)
    {
        $this->service_code = $service_code;
    }

    /**
     * @return string
     */
    public function getCollectionClientRef()
    {
        return $this->collection_client_ref;
    }

    /**
     * @param string $collection_client_ref
     */
    public function setCollectionClientRef($collection_client_ref)
    {
        $this->collection_client_ref = $collection_client_ref;
    }

    /**
     * @return string
     */
    public function getHourStart1()
    {
        return $this->hour_start_1;
    }

    /**
     * @param string $hour_start_1
     */
    public function setHourStart1($hour_start_1)
    {
        $this->hour_start_1 = $hour_start_1;
    }

    /**
     * @return string
     */
    public function getHourEnd1()
    {
        return $this->hour_end_1;
    }

    /**
     * @param string $hour_end_1
     */
    public function setHourEnd1($hour_end_1)
    {
        $this->hour_end_1 = $hour_end_1;
    }

    /**
     * @return string
     */
    public function getHourStart2()
    {
        return $this->hour_start_2;
    }

    /**
     * @param string $hour_start_2
     */
    public function setHourStart2($hour_start_2)
    {
        $this->hour_start_2 = $hour_start_2;
    }

    /**
     * @return string
     */
    public function getHourEnd2()
    {
        return $this->hour_end_2;
    }

    /**
     * @param string $hour_end_2
     */
    public function setHourEnd2($hour_end_2)
    {
        $this->hour_end_2 = $hour_end_2;
    }

}