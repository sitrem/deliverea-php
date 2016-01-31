<?php

namespace Deliverea\Request;

class GetShipmentsRequest
{
    const SEARCH_TYPE_SHIPMENT = 'shipment';
    const SEARCH_TYPE_COLLECTION = 'collection';

    /** @var string */
    public $filter_search_type = '';

    public function __construct(array $filters)
    {
        foreach ($filters as $filter => $value) {
            $this->$filter = $value;
        }
    }
}