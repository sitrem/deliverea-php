<?php

namespace Deliverea\Response;

use Deliverea\Common\CreateAddressTrait;
use Deliverea\Common\CreateShipmentTrait;
use Deliverea\Common\CreateTrackingEventTrait;
use Deliverea\Common\ToArrayTrait;
use Deliverea\Model\DetailedShipment;
use Deliverea\Model\TrackingEvents;

class GetShipmentResponse extends AbstractResponse
{
    protected $shipment;

    use ToArrayTrait;

    use CreateAddressTrait;

    use CreateShipmentTrait;

    use CreateTrackingEventTrait;

    /**
     * @inheritdoc
     */
    function map($response)
    {
        $shipment = $this->createShipment($response);
        $from = $this->createAddress('from', $response->from_data);
        $to = $this->createAddress('to', $response->to_data);

        $events = [];
        foreach ($response->tracking_events->tracking_history as $event) {
            $events = $this->createTrackingEvent($event);
        }

        $trackingEvents = new TrackingEvents($this->createTrackingEvent($response->tracking_events), $events);

        $this->shipment = new DetailedShipment($shipment, $from, $to, $trackingEvents);

        return $this;
    }

    /**
     * @return DetailedShipment
     */
    public function getShipment()
    {
        return $this->shipment;
    }
}