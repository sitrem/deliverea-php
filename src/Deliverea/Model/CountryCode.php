<?php
namespace Deliverea\Model;

use Deliverea\Exception\ValidationErrorException;

class CountryCode
{
    const DEFAULT_COUNTRY_CODE = "ES";
    const COUNTRY_CODE_CHARS = 2;
    const INVALID_ARGUMENT_ERROR_CODE = 500;
    const INVALID_ARGUMENT_ERROR_MESSAGE = "Country code invalid format";

    /** @var string */
    protected $countryCode;

    /**
     * @param string $countryCode
     */
    public function __construct($countryCode = null)
    {
        if (!empty($countryCode)) {
            $countryCode = self::DEFAULT_COUNTRY_CODE;
        }

        $this->setCountryCode($countryCode);
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        if ($this->isValid($countryCode)) {
            $this->countryCode = $countryCode;
        }
    }

    public function isValid($countryCode)
    {
        if (!empty($countryCode)
            && is_string($countryCode)
            && (self::COUNTRY_CODE_CHARS == strlen($countryCode))
        ) {
            return true;
        }

        throw new ValidationErrorException(self::INVALID_ARGUMENT_ERROR_CODE, self::INVALID_ARGUMENT_ERROR_MESSAGE);
    }
}