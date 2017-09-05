<?php

namespace Deliverea\Model;


use Deliverea\Common\ToArrayTrait;

class ServiceEstimation extends AbstractDeliverea
{
    use ToArrayTrait;

    protected $serviceName;

    protected $serviceCode;

    protected $estimatedArrivalDate;

    protected $estimatedArrivalTime;

    public function __construct($serviceName, $serviceCode, $estimatedArrivalDate, $estimatedArrivalTime)
    {
        $this->serviceName = $serviceName;
        $this->serviceCode = $serviceCode;
        $this->estimatedArrivalDate = $estimatedArrivalDate;
        $this->estimatedArrivalTime = $estimatedArrivalTime;
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
    public function getEstimatedArrivalDate()
    {
        return $this->estimatedArrivalDate;
    }

    /**
     * @return string
     */
    public function getEstimatedArrivalTime()
    {
        return $this->estimatedArrivalTime;
    }


}