<?php
namespace Deliverea\Model;

use Deliverea\Common\ToArrayTrait;

class DropPoint extends AbstractDeliverea
{
    use ToArrayTrait;

    /** @var string */
    protected $carrierCode;

    /** @var float */
    protected $dropPointKey;

    /** @var string */
    protected $name;

    /** @var string */
    protected $address;

    /** @var string */
    protected $zipCode;

    /** @var string */
    protected $city;

    /** @var  string */
    protected $coordinates;

    /** @var string */
    protected $latitude;

    /** @var string */
    protected $longitude;

    /** @var string */
    protected $timeTable;

    /** @var string */
    protected $phone;

    /**
     * DropPoint constructor.
     * @param string $carrierCode
     * @param float $dropPointKey
     * @param string $name
     * @param string $address
     * @param ZipCode $zipCode
     * @param string $city
     * @param Coordinates $coordinates
     * @param TimeTable $timeTable
     * @param string $phone
     */
    public function __construct($carrierCode, $dropPointKey, $name, $address, ZipCode $zipCode, $city, Coordinates $coordinates, TimeTable $timeTable, $phone)
    {
        $this->carrierCode = $carrierCode;
        $this->dropPointKey = $dropPointKey;
        $this->name = $name;
        $this->address = $address;
        $this->zipCode = $zipCode->getZipCode();
        $this->city = $city;
        $this->latitude = $coordinates->getLatitude();
        $this->longitude = $coordinates->getLongitude();
        $this->timeTable = $timeTable->getTimeTable();
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->carrierCode;
    }

    /**
     * @param string $carrierCode
     */
    public function setCarrierCode($carrierCode)
    {
        $this->carrierCode = $carrierCode;
    }

    /**
     * @return float
     */
    public function getDropPointKey()
    {
        return $this->dropPointKey;
    }

    /**
     * @param float $dropPointKey
     */
    public function setDropPointKey($dropPointKey)
    {
        $this->dropPointKey = $dropPointKey;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getTimeTable()
    {
        return $this->timeTable;
    }

    /**
     * @param string $timeTable
     */
    public function setTimeTable($timeTable)
    {
        $this->timeTable = $timeTable;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

}