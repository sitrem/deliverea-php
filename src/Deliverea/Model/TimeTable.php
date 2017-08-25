<?php
namespace Deliverea\Model;

use Deliverea\Exception\ValidationErrorException;

class TimeTable
{
    const DAY_OF_WEEK_0 = 'sun';
    const DAY_OF_WEEK_1 = 'mon';
    const DAY_OF_WEEK_2 = 'tue';
    const DAY_OF_WEEK_3 = 'wed';
    const DAY_OF_WEEK_4 = 'thu';
    const DAY_OF_WEEK_5 = 'fri';
    const DAY_OF_WEEK_6 = 'sat';
    const INVALID_ARGUMENT_ERROR_CODE = 500;
    const INVALID_ARGUMENT_ERROR_MESSAGE = "TimeTable invalid format";

    private $validDays = [self::DAY_OF_WEEK_1, self::DAY_OF_WEEK_2, self::DAY_OF_WEEK_3, self::DAY_OF_WEEK_4, self::DAY_OF_WEEK_5, self::DAY_OF_WEEK_6, self::DAY_OF_WEEK_0];

    /** @var string */
    protected $timeTable;

    /**
     * @param array $timeTable
     */
    public function __construct($timeTable)
    {
        $this->setTimeTable($timeTable);
    }

    /**
     * @return string
     */
    public function getTimeTable()
    {
        return $this->timeTable;
    }

    /**
     * @param array $timeTable
     */
    public function setTimeTable($timeTable)
    {
        if ($this->isValidTimeTable($timeTable)) {
            $this->timeTable = $timeTable;
        }
    }

    public function isValidTimeTable($timeTable)
    {
        if (!empty($timeTable)) {
            foreach ($timeTable as $day => $time){
                if(!$this->isValidDay($day)){
                    throw new ValidationErrorException(self::INVALID_ARGUMENT_ERROR_CODE, self::INVALID_ARGUMENT_ERROR_MESSAGE);
                }
            }
        }
        return true;
    }

    public function isValidDay($day)
    {
        return in_array($day, $this->validDays);
    }
}