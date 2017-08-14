<?php
namespace Deliverea\Model;

use Deliverea\Common\ToArrayTrait;

class DropPoint extends AbstractDeliverea
{
    use ToArrayTrait;

    /** @var string */
    protected $carrier_code;

    /** @var float */
    protected $drop_point_key;

    /** @var string */
    protected $name;

    /** @var string */
    protected $address;

    /** @var string */
    protected $zip_code;

    /** @var string */
    protected $city;

    /** @var string */
    protected $latitude;

    /** @var string */
    protected $longitude;

    /** @var string */
    protected $timetable;

    /** @var string */
    protected $phone;

    /**
     * DropPoint constructor.
     * @param string $carrier_code
     * @param float $drop_point_key
     * @param string $name
     * @param string $address
     * @param string $zip_code
     * @param string $city
     * @param string $latitude
     * @param string $longitude
     * @param string $timetable
     * @param string $phone
     */
    public function __construct($carrier_code, $drop_point_key, $name, $address, $zip_code, $city, $latitude, $longitude, $timetable, $phone)
    {
        $this->carrier_code = $carrier_code;
        $this->drop_point_key = $drop_point_key;
        $this->name = $name;
        $this->address = $address;
        $this->zip_code = $zip_code;
        $this->city = $city;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->timetable = $timetable;
        $this->phone = $phone;
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
     * @return float
     */
    public function getDropPointKey()
    {
        return $this->drop_point_key;
    }

    /**
     * @param float $drop_point_key
     */
    public function setDropPointKey($drop_point_key)
    {
        $this->drop_point_key = $drop_point_key;
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
        return $this->zip_code;
    }

    /**
     * @param string $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
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
    public function getTimetable()
    {
        return $this->timetable;
    }

    /**
     * @param string $timetable
     */
    public function setTimetable($timetable)
    {
        $this->timetable = $timetable;
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