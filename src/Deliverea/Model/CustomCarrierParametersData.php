<?php
namespace Deliverea\Model;

use Deliverea\Common\ToArrayTrait;

class CustomCarrierParametersData extends AbstractDeliverea
{
    use ToArrayTrait;

    /** @var array */
    private $parameters;

    public function __construct($customCarrierParameters) {
        $this->parameters = (array) $customCarrierParameters;
    }

    /**
     * @return string
     */
    public function hasParameter($parameter)
    {
        return (array_key_exists($parameter, $this->parameters));
    }

    /**
     * @return string
     */
    public function getParameter($parameter)
    {
        if ($this->hasParameter($parameter)) {
            return $this->parameters[$parameter];
        }

        return null;
    }
}