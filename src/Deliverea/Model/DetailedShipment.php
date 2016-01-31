<?php
namespace Deliverea\Model;

class DetailedShipment
{
    /** @var Shipment */
    private $shipment;

    /** @var Address */
    private $from;

    /** @var Address */
    private $to;

    /** @var TrackingEvents */
    private $tracking_events;

    /**
     * @param Shipment $shipment
     * @param Address $from
     * @param Address $to
     * @param TrackingEvents $tracking_events
     */
    public function __construct(
        Shipment $shipment,
        Address $from = null,
        Address $to = null,
        TrackingEvents $tracking_events = null
    ) {
        $this->shipment = $shipment;
        $this->from = $from;
        $this->to = $to;
        $this->tracking_events = $tracking_events;
    }

    /**
     * @return Shipment
     */
    public function getShipment()
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     */
    public function setShipment($shipment)
    {
        $this->shipment = $shipment;
    }

    /**
     * @return Address
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param Address $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return Address
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param Address $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return TrackingEvents
     */
    public function getTrackingEvents()
    {
        return $this->tracking_events;
    }

    /**
     * @param TrackingEvents $tracking_events
     */
    public function setTrackingEvents($tracking_events)
    {
        $this->tracking_events = $tracking_events;
    }
}