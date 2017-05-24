<?php

namespace Deliverea\Exception;

class ErrorResponseException extends \Exception
{
    private $errorCode;

    private $errorMessage;

    private $errorArray;

    /**
     * ErrorResponseException constructor.
     * @param string $errorCode
     * @param int $errorMessage
     * @param null $carrierErrorCode
     * @param null $carrierErrorMessage
     */
    public function __construct($errorCode, $errorMessage, $carrierErrorCode = null, $carrierErrorMessage = null)
    {
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;

        $this->errorArray = [
            'errorCode' => $errorCode,
            'errorMessage' => $errorMessage,
            'carrierErrorCode' => $carrierErrorCode,
            'carrierErrorMessage' => $carrierErrorMessage
        ];

    }

    public function __toString()
    {
        return __CLASS__ . ' Deliverea responded with an error, errorCode: ' . $this->errorCode . ' - ' . $this->errorMessage;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function getErrorArray()
    {
        return $this->errorArray;
    }
}