<?php

namespace Deliverea\Common;

use Deliverea\Model\DropPoint;

trait CreateDropPointTrait
{
    /**
     * @param $prefix
     * @param $data
     * @return DropPoint
     */
    private function createDropPoint($data)
    {
        $data = (array)$data;

        $dropPoint = new DropPoint(
            $this->getValue($data, 'carrier_code', ''),
            $this->getValue($data, 'drop_point_key', ''),
            $this->getValue($data, 'name', ''),
            $this->getValue($data, 'address', ''),
            $this->getValue($data, 'zip_code', ''),
            $this->getValue($data, 'city', ''),
            $this->getValue($data, 'latitude', ''),
            $this->getValue($data, 'longitude', ''),
            $this->getValue($data, 'time_table', ''),
            $this->getValue($data, 'phone', '')
        );

        return $dropPoint;
    }
}