<?php

namespace Deliverea\Response;

use Deliverea\Common\ToArrayTrait;
use Deliverea\Model\Coordinates;
use Deliverea\Model\DropPoint;
use Deliverea\Model\TimeTable;
use Deliverea\Model\ZipCode;

class GetDropPointsResponse extends AbstractResponse
{
    use ToArrayTrait;

    /** @var array */
    private $dropPoints = [];

    /**
     * @inheritdoc
     */
    function map($response)
    {
        foreach ($response as $dropPoint) {
            $this->dropPoints[] = new DropPoint(
                $dropPoint->carrier_code,
                $dropPoint->drop_point_key,
                $dropPoint->name,
                $dropPoint->address,
                new ZipCode($dropPoint->zip_code),
                $dropPoint->city,
                new Coordinates($dropPoint->latitude, $dropPoint->longitude),
                new TimeTable($dropPoint->time_table),
                $dropPoint->phone
            );
        }
        return $this;
    }

    /**
     * @return ServicePrice
     */
    public function getDropPoints()
    {
        return $this->dropPoints;
    }
}