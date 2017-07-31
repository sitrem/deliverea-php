<?php
namespace Deliverea\Model;

use Deliverea\Exception\ValidationErrorException;

class ZipCode
{
    const ZIP_CODE_MIN_CHARS = 4;
    const ZIP_CODE_MAX_CHARS = 10;
    const INVALID_ARGUMENT_ERROR_CODE = 500;
    const INVALID_ARGUMENT_ERROR_MESSAGE = "Zip code invalid format";

    /** @var string */
    protected $zipCode;

    /**
     * @param string $zipCode
     */
    public function __construct($zipCode)
    {
        $this->setZipCode($zipCode);
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
        if ($this->isValid($zipCode)) {
            $this->zipCode = $zipCode;
        }
    }

    public function isValid($zipCode)
    {
        if (!empty($zipCode)
            && is_string($zipCode)
            && (self::ZIP_CODE_MIN_CHARS <= strlen($zipCode))
            && (self::ZIP_CODE_MAX_CHARS >= strlen($zipCode))
        ) {
            return true;
        }

        throw new ValidationErrorException(self::INVALID_ARGUMENT_ERROR_CODE, self::INVALID_ARGUMENT_ERROR_MESSAGE);
    }
}