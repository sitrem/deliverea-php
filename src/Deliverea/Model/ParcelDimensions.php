<?php
namespace Deliverea\Model;

use Deliverea\Exception\ValidationErrorException;

class ParcelDimensions
{
    const INVALID_ARGUMENT_ERROR_CODE = 500;
    const INVALID_WIDTH_ARGUMENT_ERROR_MESSAGE = "Width invalid format";
    const INVALID_HEIGHT_ARGUMENT_ERROR_MESSAGE = "Height code invalid format";
    const INVALID_LENGTH_ARGUMENT_ERROR_MESSAGE = "Length code invalid format";
    const INVALID_VOLUME_ARGUMENT_ERROR_MESSAGE = "Volume code invalid format";
    const MINIMUM_VALUE = 0.1;

    /** @var float */
    protected $width;

    /** @var float */
    protected $height;

    /** @var float */
    protected $length;

    /** @var float */
    protected $volume;

    /**
     * ParcelDimensions constructor.
     * @param float $width
     * @param float $height
     * @param float $length
     * @param float $volume
     */
    public function __construct($width, $height, $length, $volume)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setLength($length);
        $this->setVolume($volume);
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        if ($this->isValidWidth($width)) {
            $this->width = $width;
        }
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        if ($this->isValidHeight($height)) {
            $this->height = $height;
        }
    }

    /**
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param float $length
     */
    public function setLength($length)
    {
        if ($this->isValidLength($length)) {
            $this->length = $length;
        }
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     */
    public function setVolume($volume)
    {
        if ($this->isValidVolume($volume)) {
            $this->volume = $volume;
        }
    }

    public function isValidWidth($width)
    {
        if ($this->isValidMeasure($width)) {
            return true;
        }

        $this->throwInvalidArgumentException(self::INVALID_WIDTH_ARGUMENT_ERROR_MESSAGE);
    }

    public function isValidLength($length)
    {
        if ($this->isValidMeasure($length)) {
            return true;
        }

        $this->throwInvalidArgumentException(self::INVALID_LENGTH_ARGUMENT_ERROR_MESSAGE);
    }

    public function isValidHeight($height)
    {
        if ($this->isValidMeasure($height)) {
            return true;
        }

        $this->throwInvalidArgumentException(self::INVALID_HEIGHT_ARGUMENT_ERROR_MESSAGE);
    }

    public function isValidVolume($volume)
    {
        if ($this->isValidMeasure($volume)) {
            return true;
        }

        $this->throwInvalidArgumentException(self::INVALID_VOLUME_ARGUMENT_ERROR_MESSAGE);
    }

    private function throwInvalidArgumentException($message)
    {
        throw new ValidationErrorException(self::INVALID_ARGUMENT_ERROR_CODE, $message);
    }

    /**
     * @param $measure
     * @return bool
     */
    private function isValidMeasure($measure)
    {
        return (!empty($measure)
            && is_float($measure)
            && (self::MINIMUM_VALUE <= $measure));
    }
}