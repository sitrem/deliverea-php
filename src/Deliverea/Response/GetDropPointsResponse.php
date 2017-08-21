<?php

namespace Deliverea\Response;

use Deliverea\Common\ToArrayTrait;
use Deliverea\Model\DropPoint;

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

        foreach ($response->drop_points as $dropPoint) {
            $this->dropPoints[] = new DropPoint(
                $dropPoint->carrier_code,
                $dropPoint->drop_point_key,
                $dropPoint->name,
                $dropPoint->address,
                $dropPoint->zip_code,
                $dropPoint->city,
                $dropPoint->latitude,
                $dropPoint->longitude,
                $dropPoint->time_table,
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