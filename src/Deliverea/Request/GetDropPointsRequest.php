<?php

namespace Deliverea\Request;

class GetDropPointsRequest
{

    public function __construct(array $data)
    {
        foreach ($data as $parameter => $value) {
            $this->$parameter = $value;
        }
    }
}