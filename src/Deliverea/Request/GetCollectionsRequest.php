<?php

namespace Deliverea\Request;

class GetCollectionsRequest
{
    /** @var string */
    public $filter_search_type = '';

    public function __construct(array $filters)
    {
        foreach ($filters as $filter => $value) {
            $this->$filter = $value;
        }
    }
}