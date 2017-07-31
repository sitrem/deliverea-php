<?php
namespace Deliverea\Model;

use Deliverea\Common\ToArrayTrait;

class ServicePrice extends AbstractDeliverea
{
    use ToArrayTrait;

    /** @var float */
    protected $commercialPrice;

    /** @var float */
    protected $price;

    /** @var string */
    protected $serviceName;

    /** @var string */
    protected $serviceCode;

    /** @var string */
    protected $carrierName;

    /** @var string */
    protected $carrierCode;

    /**
     * ServicePrice constructor.
     * @param float $commercialPrice
     * @param float $price
     * @param string $serviceName
     * @param string $serviceCode
     * @param string $carrierName
     * @param string $carrierCode
     */
    public function __construct($commercialPrice, $price, $serviceName, $serviceCode, $carrierName, $carrierCode)
    {
        $this->commercialPrice = $commercialPrice;
        $this->price = $price;
        $this->serviceName = $serviceName;
        $this->serviceCode = $serviceCode;
        $this->carrierName = $carrierName;
        $this->carrierCode = $carrierCode;
    }

    /**
     * @return float
     */
    public function getCommercialPrice()
    {
        return $this->commercialPrice;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @return string
     */
    public function getServiceCode()
    {
        return $this->serviceCode;
    }

    /**
     * @return string
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->carrierCode;
    }
}