<?php

namespace Deliverea\Response;

use Deliverea\Common\ToArrayTrait;
use Deliverea\Model\ServicePrice;

class GetShipmentsRatesResponse extends AbstractResponse
{
    use ToArrayTrait;

    /** @var ServicePrice */
    private $bestServicePrice = [];

    /** @var array */
    private $servicePrices = [];

    /**
     * @inheritdoc
     */
    function map($response)
    {
        $this->bestServicePrice = new ServicePrice(
            $response->best_price_service->commercial_price,
            $response->best_price_service->price,
            $response->best_price_service->service_name,
            $response->best_price_service->service_code,
            $response->best_price_service->carrier_name,
            $response->best_price_service->carrier_code
        );

        foreach ($response->services as $servicePrice) {
            $this->servicePrices[] = new ServicePrice(
                $servicePrice->commercial_price,
                $servicePrice->price,
                $servicePrice->service_name,
                $servicePrice->service_code,
                $servicePrice->carrier_name,
                $servicePrice->carrier_code
            );
        }

        return $this;
    }

    /**
     * @return ServicePrice
     */
    public function getBestServicePrice()
    {
        return $this->bestServicePrice;
    }

    /**
     * @return array
     */
    public function getServicePrices()
    {
        return $this->servicePrices;
    }
}