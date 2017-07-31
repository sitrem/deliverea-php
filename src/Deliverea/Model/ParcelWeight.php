<?php
namespace Deliverea\Model;

use Deliverea\Exception\ValidationErrorException;

class ParcelWeight
{
    const INVALID_ARGUMENT_ERROR_CODE = 500;
    const INVALID_WEIGHT_ARGUMENT_ERROR_MESSAGE = "Weight invalid format";
    const MINIMUM_VALUE = 0.1;

    /** @var float */
    protected $weight;

    /**
     * ParcelDimensions constructor.
     * @param float $weight
     */
    public function __construct($weight)
    {
        $this->setWeight($weight);
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        if ($this->isValidWeight($weight)) {
            $this->weight = $weight;
        }
    }

    public function isValidWeight($weight)
    {
        if (!empty($weight)
            && is_float($weight)
            && (self::MINIMUM_VALUE <= $weight)
        ) {
            return true;
        }

        throw new ValidationErrorException(self::INVALID_ARGUMENT_ERROR_CODE, self::INVALID_WEIGHT_ARGUMENT_ERROR_MESSAGE);
    }
}