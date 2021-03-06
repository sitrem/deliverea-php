<?php

namespace Deliverea\Response;

use Deliverea\Common\CreateAddressTrait;
use Deliverea\Common\CreateShipmentTrait;
use Deliverea\Common\CreateDropPointTrait;
use Deliverea\Common\CreateTrackingEventTrait;
use Deliverea\Common\ToArrayTrait;
use Deliverea\Core\DlvModels\DropPoint\DlvDropPoint;
use Deliverea\Model\DetailedShipment;
use Deliverea\Model\DropPoint;
use Deliverea\Model\SLAData;
use Deliverea\Model\TrackingEvents;

class GetShipmentResponse extends AbstractResponse
{
    protected $shipment;

    use ToArrayTrait;

    use CreateAddressTrait;

    use CreateShipmentTrait;

    use CreateTrackingEventTrait;

    use CreateDropPointTrait;

    /**
     * @inheritdoc
     */
    function map($response)
    {
        $shipment = $this->createShipment($response);
        $to = $this->createAddress('to', $response->to_data);
        $from = $this->createAddress('from', $response->from_data);
        $dropPoint = null;
        if ($response->drop_point_data) {
            $dropPoint = $this->createDropPoint($response->drop_point_data);
        }
        $serviceLevelData = null;
        $trackingEvents = null;

        if (!empty($response->tracking_events)) {
            $events = [];
            foreach ($response->tracking_events->tracking_history as $event) {
                $events[] = $this->createTrackingEvent($event);
            }


            $trackingEvents = new TrackingEvents($this->createTrackingEvent($response->tracking_events), $events);
        }

        if (!empty($response->sla_data)) {
            $serviceLevelData = new SLAData(
                $response->sla_data->tracking_start_date,
                $response->sla_data->tracking_delivered_date,
                $response->sla_data->tracking_current_code,
                $response->sla_data->hours_elapsed,
                $response->sla_data->service_sla_hours
            );
        };

        $this->shipment = new DetailedShipment($shipment, $from, $to, $trackingEvents, $serviceLevelData, null, $dropPoint);
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