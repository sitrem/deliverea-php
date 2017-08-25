<?php
namespace Deliverea\Model;

use Deliverea\Exception\ValidationErrorException;

class Coordinates
{
    const INVALID_ARGUMENT_ERROR_CODE = 500;
    const INVALID_ARGUMENT_ERROR_MESSAGE = "Coordinates invalid format";

    /** @var string */
    protected $latitude;
    protected $longitude;

    /**
     * @param string $latitude
     * @param string $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
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
        if ($this->isValid($latitude)) {
            $this->latitude = $latitude;
        }
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
        if ($this->isValid($longitude)) {
            $this->longitude = $longitude;
        }
    }

    public function isValid($coordinate)
    {
        if (!empty($coordinate)) {
            return true;
        }

        throw new ValidationErrorException(self::INVALID_ARGUMENT_ERROR_CODE, self::INVALID_ARGUMENT_ERROR_MESSAGE);
    }
}