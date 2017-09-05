<?php

namespace Deliverea\Response;


use Deliverea\Common\ToArrayTrait;
use Deliverea\Model\ServiceEstimation;

class GetShipmentTimeArrivalEstimationResponse extends AbstractResponse
{
    use ToArrayTrait;

    private $bestArrivalTime;

    private $services;

    /**
     * @inheritdoc
     */
    function map($response)
    {
        $this->bestServicePrice = new ServiceEstimation(
            $response->bestArrivalTime->serviceName,
            $response->bestArrivalTime->serviceCode,
            $response->bestArrivalTime->estimatedArrivalDate,
            $response->bestArrivalTime->estimatedArrivalTime
        );

        foreach ($response->services as $serviceEstimation) {
            $this->services[] = new ServiceEstimation(
                $serviceEstimation->serviceName,
                $serviceEstimation->serviceCode,
                $serviceEstimation->estimatedArrivalDate,
                $serviceEstimation->estimatedArrivalTime
            );
        }

        return $this;
    }

    /**
     * @return ServiceEstimation
     */
    public function getBestServicePrice()
    {
        return $this->bestArrivalTime;
    }

    /**
     * @return array
     */
    public function getServicePrices()
    {
        return $this->services;
    }
}