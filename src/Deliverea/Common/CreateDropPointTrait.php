<?php
namespace Deliverea\Common;
use Deliverea\Model\Coordinates;
use Deliverea\Model\DropPoint;
use Deliverea\Model\TimeTable;
use Deliverea\Model\ZipCode;
trait CreateDropPointTrait
{
    /**
     * @param $data
     * @return DropPoint
     */
    private function createDropPoint($data)
    {
        $data = (array)$data;
        $coordinates = new Coordinates($this->getValue($data, 'latitude', ''), $this->getValue($data, 'longitude', ''));
        $zipCode = new ZipCode($this->getValue($data, 'zip_code', ''));
        $timeTable = new TimeTable($this->getValue($data, 'time_table', ''));
        $dropPoint = new DropPoint(
            $this->getValue($data, 'carrier_code', ''),
            $this->getValue($data, 'drop_point_key', ''),
            $this->getValue($data, 'name', ''),
            $this->getValue($data, 'address', ''),
            $zipCode,
            $this->getValue($data, 'city', ''),
            $coordinates,
            $timeTable,
            $this->getValue($data, 'phone', '')
        );
        return $dropPoint;
    }
}