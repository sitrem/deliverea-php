<?php

namespace Deliverea;

use Deliverea\Exception\CurlException;
use Deliverea\Exception\ErrorResponseException;
use Deliverea\Exception\UnexpectedResponseException;
use Deliverea\Model\Collection;
use Deliverea\Model\Address;
use Deliverea\Model\CountryCode;
use Deliverea\Model\ParcelDimensions;
use Deliverea\Model\ParcelWeight;
use Deliverea\Model\Shipment;
use Deliverea\Model\ZipCode;
use Deliverea\Request\GetAddressesRequest;
use Deliverea\Request\GetClientCarriersRequest;
use Deliverea\Request\GetClientServicesRequest;
use Deliverea\Request\GetCollectionCutoffHour;
use Deliverea\Request\GetCollectionsRequest;
use Deliverea\Request\GetServiceInfoRequest;
use Deliverea\Request\GetShipmentLabelRequest;
use Deliverea\Request\GetShipmentRequest;
use Deliverea\Request\GetShipmentsRatesRequest;
use Deliverea\Request\GetShipmentsRequest;
use Deliverea\Request\GetShipmentTimeArrivalEstimationRequest;
use Deliverea\Request\GetShipmentTrackingRequest;
use Deliverea\Request\NewCollectionRequest;
use Deliverea\Request\NewShipmentRequest;
use Deliverea\Request\GetDropPointsRequest;
use Deliverea\Response\AbstractResponse;
use Deliverea\Response\GetAddressesResponse;
use Deliverea\Response\GetClientCarriersResponse;
use Deliverea\Response\GetClientServicesResponse;
use Deliverea\Response\GetCollectionCutoffHourResponse;
use Deliverea\Response\GetCollectionsResponse;
use Deliverea\Response\GetServiceInfoResponse;
use Deliverea\Response\GetShipmentLabelResponse;
use Deliverea\Response\GetShipmentResponse;
use Deliverea\Response\GetShipmentsRatesResponse;
use Deliverea\Response\GetShipmentsResponse;
use Deliverea\Response\GetShipmentTimeArrivalEstimationResponse;
use Deliverea\Response\GetShipmentTrackingResponse;
use Deliverea\Response\NewCollectionResponse;
use Deliverea\Response\NewShipmentResponse;
use Deliverea\Response\GetDropPointsResponse;

class Deliverea
{
    private $username = '';
    private $password = '';

    private $isSandbox = false;

    private $baseEndpoint = 'https://dlvrapi.com/v1';
    private $baseEndpointSandbox = 'https://sandbox.dlvrapi.com/v1';

    /**
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param Shipment $shipment
     * @param Address $from
     * @param Address $to
     * @return NewShipmentResponse
     */
    public function newShipment(Shipment $shipment, Address $from, Address $to)
    {
        $shipment->shipping_date = $this->formatDate($shipment->shipping_date);

        return $this->post('new-shipment', new NewShipmentRequest($shipment, $from, $to),
            new NewShipmentResponse());
    }

    /**
     * @param $shippingDate
     * @return mixed
     */
    public function formatDate($shippingDate)
    {
        if ($shippingDate instanceof \DateTime) {

            return $shippingDate->format('Y-m-d');
        }

        return $shippingDate;
    }

    /**
     * @param Collection $collection
     * @param Address $from
     * @param Address $to
     * @return NewCollectionResponse
     */
    public function newCollection(Collection $collection, Address $from, Address $to)
    {
        return $this->post('new-collection', new NewCollectionRequest($collection, $from, $to),
            new NewCollectionResponse());
    }

    /**
     * @param $dlvrReference
     * @return GetShipmentLabelResponse
     */
    public function getShipmentLabel($dlvrReference)
    {
        return $this->get('get-shipment-label', new GetShipmentLabelRequest($dlvrReference),
            new GetShipmentLabelResponse());
    }

    /**
     * @param array $filters
     * @return array
     */
    public function getShipments($filters = [])
    {
        return $this->get('get-shipments', new GetShipmentsRequest($filters), new GetShipmentsResponse());
    }

    /**
     * @param array $filters
     * @return array
     */
    public function getCollections($filters = [])
    {
        return $this->get('get-collections', new GetCollectionsRequest($filters), new GetCollectionsResponse());
    }

    /**
     * @param $dlvrReference
     * @return GetShipmentResponse
     */
    public function getShipment($dlvrReference)
    {
        return $this->get('get-shipment', new GetShipmentRequest($dlvrReference), new GetShipmentResponse());
    }

    /**
     * @param $dlvrReference
     * @return GetShipmentTrackingResponse
     */
    public function getShipmentTracking($dlvrReference)
    {
        return $this->get('get-shipment-tracking', new GetShipmentTrackingRequest($dlvrReference),
            new GetShipmentTrackingResponse());
    }

    /**
     * @return GetServiceInfoResponse
     */
    public function getServiceInfo(
        $carrierCode,
        $serviceCode,
        $fromCountryCode,
        $fromZipCode,
        $toCountryCode,
        $toZipCode
    ) {
        return $this->get(
            'get-service-info',
            new GetServiceInfoRequest(
                $carrierCode,
                $serviceCode,
                $fromCountryCode,
                $fromZipCode,
                $toCountryCode,
                $toZipCode
            ),
            new GetServiceInfoResponse()
        );
    }

    /**
     * @return GetAddressesResponse
     */
    public function getAddresses()
    {
        return $this->get('get-addresses', new GetAddressesRequest(),
            new GetAddressesResponse());
    }

    /**
     * @return GetClientCarriersResponse
     */
    public function getClientCarriers()
    {
        return $this->get('get-client-carriers', new GetClientCarriersRequest(), new GetClientCarriersResponse());
    }

    /**
     * @param null $carrierCode
     * @param null $serviceCode
     * @param null $serviceRegion
     * @param null $serviceType
     * @param null $status
     * @return GetClientServicesResponse
     */
    public function getClientServices(
        $carrierCode = null,
        $serviceCode = null,
        $serviceRegion = null,
        $serviceType = null,
        $status = null
    ) {
        return $this->get('get-client-services',
            new GetClientServicesRequest($carrierCode, $serviceCode, $serviceRegion, $serviceType, $status),
            new GetClientServicesResponse());
    }

    /**
     * @param CountryCode $originCountryCode
     * @param ZipCode $originZipCode
     * @param CountryCode $destinationCountryCode
     * @param ZipCode $destinationZipCode
     * @param ParcelDimensions $dimensions
     * @param ParcelWeight $weight
     *
     * @return GetShipmentsRatesResponse
     */
    public function getShipmentsRates(
        $originCountryCode,
        $originZipCode,
        $destinationCountryCode,
        $destinationZipCode,
        $dimensions,
        $weight
    ) {
        return $this->get('get-shipments-rates',
            new GetShipmentsRatesRequest(
                $originCountryCode,
                $originZipCode,
                $destinationCountryCode,
                $destinationZipCode,
                $dimensions,
                $weight
            ),
            new GetShipmentsRatesResponse());
    }


    public function getShipmentTimeArrivalEstimation(
        CountryCode $originCountryCode,
        ZipCode $originZipCode,
        CountryCode $destinationCountryCode,
        ZipCode $destinationZipCode,
        $shippingDate
    ) {
        return $this->get('get-shipment-time-arrival-estimation',
            new GetShipmentTimeArrivalEstimationRequest(
                $originCountryCode,
                $originZipCode,
                $destinationCountryCode,
                $destinationZipCode,
                $shippingDate
            ),
            new GetShipmentTimeArrivalEstimationResponse());
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function getCollectionCutoffHour($data)
    {
        return $this->get('get-collection-cutoff-hour', new GetCollectionCutoffHour($data),
            new GetCollectionCutoffHourResponse());
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function getDropPoints($data)
    {
        return $this->get('get-drop-points', new GetDropPointsRequest($data),
            new GetDropPointsResponse());
    }

    /**
     * @param bool $sandbox
     */
    public function setSandbox($sandbox)
    {
        $this->isSandbox = $sandbox;
    }

    /**
     * @return bool
     */
    public function getSandbox()
    {
        return $this->isSandbox;
    }

    /**
     * @param $urlEndpoint
     * @param $urlEndpointSandbox
     */
    public function setUrlEndpoint($urlEndpoint, $urlEndpointSandbox)
    {
        $this->baseEndpoint = $urlEndpoint;
        $this->baseEndpointSandbox = $urlEndpointSandbox;
    }

    private function get($url, $request, AbstractResponse $response)
    {
        return $this->request($url, $request, $response, 'GET');
    }

    private function post($url, $request, AbstractResponse $response)
    {
        return $this->request($url, $request, $response, 'POST');
    }

    private function request($url, $request, AbstractResponse $response, $type)
    {
        // TODO: Test invalid credentials

        if (empty($this->username) || empty($this->password)) {
            throw new \Exception("Please provide your API credentials");
        }

        $params = http_build_query($request);

        $endpoint = $this->baseEndpoint;

        if ($this->getSandbox()) {
            $endpoint = $this->baseEndpointSandbox;
        }

        $url = $endpoint . '/' . $url;

        if ($type == 'GET') {
            $url .= '?' . $params;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->password);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        if ($type == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new CurlException($url);
        }

        curl_close($ch);

        $result = json_decode($result);

        if ($result === null) {
            throw new UnexpectedResponseException($url);
        }

        if ($result->status === 'err') {
            if (is_object($result->data) && property_exists($result->data, 'errorCode')) {
                $carrierErrorCode = isset($result->data->carrierErrorCode) ? $result->data->carrierErrorCode : null;
                $carrierErrorMessage = isset($result->data->carrierErrorMessage) ? $result->data->carrierErrorMessage : null;

                throw new ErrorResponseException($result->data->errorCode, $result->data->errorMessage,
                    $carrierErrorCode, $carrierErrorMessage);
            } elseif (is_object($result->data) && property_exists($result->data, 'message')) {

                throw new ErrorResponseException(-1, $result->data->message);
            } else {
                throw new ErrorResponseException(-1, $result->data[0]);
            }
        }

        return $response->map($result->data);
    }
}