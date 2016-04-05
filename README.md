# deliverea-php
Deliverea PHP API Library

This is the official library used to integrate with Deliverea's API, it is currently in beta stages so if there are any bugs or fixes you would like to contribute please do so with Pull Requests.

Compatibility:
- Deliverea v1: https://www.deliverea.com/es/api/

## Installation
```
composer require deliverea/deliverea-php 0.0.5
```

## Methods
- New Shipment
- New Collection
- Get Shipment
- Get Shipment Tracking
- Get Shipment Label
- Get Shipments
- Get Addresses

### Exceptions
Wrap all requests with a try catch of these exceptions or simply a standard \Exception
- \Deliverea\Exception\CurlException
- \Deliverea\Exception\ErrorResponseException
- \Deliverea\Exception\UnexpectedResponseException

####Example:
```
try {
    $deliverea->newShipment($shipment, 32, $address);
} catch (\Deliverea\Exception\CurlException $e) {

} catch (\Deliverea\Exception\ErrorResponseException $e) {

} catch (\Deliverea\Exception\UnexpectedResponseException $e) {

}
 
```

### New Shipment
```
// Create API Client
$deliverea = new \Deliverea\Deliverea('apiuser', 'apisecret');


// Enable Sandbox
$deliverea->setSandbox(true);

// Create shipment
$shipment = new \Deliverea\Model\Shipment(1, substr(md5(strtotime('now')), 0, 14), new \DateTime(), 'custom',
    'ovirtual', 'ovirtual-servicio-19');

$address = new \Deliverea\Model\Address(
    'Full name',
    'Street Type',
    'Street Name',
    'Street Number',
    'Floor',
    'City',
    'Zip Code',
    'CountryCode',
    'Phone'
);

$deliverea->newShipment($shipment, 32, $address);
```

### New Collection
```
// Create API Client
$deliverea = new \Deliverea\Deliverea('apiuser', 'apisecret');


// Create collection
$collection = new \Deliverea\Model\Collection(substr(md5(strtotime('now')), 0, 14), new \DateTime(),
    'ovirtual', 'ovirtual-servicio-19', '11:00', '16:00');

$address = new \Deliverea\Model\Address(
    'Full name',
    'Street Type',
    'Street Name',
    'Street Number',
    'Floor',
    'City',
    'Zip Code',
    'CountryCode',
    'Phone'
);

$deliverea->newCollection($collection, 32, $address);
```

### Get Shipment Tracking
```
$deliverea->getShipmentTracking('dlvrref');
```

### Get Shipment Details
```
$deliverea->getShipment('dlvrref');
```

### Get Shipment Label
```
$deliverea->getShipmentLabel('dlvrref');
```

### Get the Shipments via filters in the API (not including Tracking Events)
```
$deliverea->getShipments([
    'filter_shipping_dlvr_ref' => 'dlvrref'
    ...
]);
```

### Get Addresses
```
$address = $deliverea->getAddresses();
```
