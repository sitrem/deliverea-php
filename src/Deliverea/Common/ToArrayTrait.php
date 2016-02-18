<?php

namespace Deliverea\Common;

trait ToArrayTrait
{
    public function toArray()
    {
        $data = [];

        foreach (get_object_vars($this) as $key => $value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $data[$key] = $value->toArray();
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}