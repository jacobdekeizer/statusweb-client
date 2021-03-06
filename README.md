# Statusweb API client for PHP

[![Packagist Version](https://img.shields.io/packagist/v/jacobdekeizer/statusweb-client)](https://packagist.org/packages/jacobdekeizer/statusweb-client)
[![Packagist](https://img.shields.io/packagist/l/jacobdekeizer/statusweb-client?color=brightgreen)](https://packagist.org/packages/jacobdekeizer/statusweb-client)
[![Packagist](https://img.shields.io/packagist/dt/jacobdekeizer/statusweb-client?color=brightgreen)](https://packagist.org/packages/jacobdekeizer/statusweb-client)

Get your api keys from Statusweb > Help > Statusweb API. On this page you can also get the Statusweb API documentation.

## Installation

You can install this package via composer:

```
composer require jacobdekeizer/statusweb-client
```

## Usage

> This readme shows basic usage of this package, for all available options look at the class definitions and the api documentation.

Create the client

```php
$client = (new \JacobDeKeizer\Statusweb\Client())
    ->setApiKey('api_key')
    ->setPassword('password');
```

### Create shipment

```php
$deliveryAddress = (new \JacobDeKeizer\Statusweb\Resources\Address())
    ->setStreet('Lange laan')
    ->setCity('Zevenaar')
    ->setHouseNumber('29A')
    ->setPostalCode('9281EM')
    ->setCountryCode(\JacobDeKeizer\Statusweb\Enums\CountryCode::NETHERLANDS)
    ->setEmail('noreply@example.com')
    ->setToTheAttentionOf('tav')
    ->setPhoneNumber('+31612345678')
    ->setName('Gijs Boersma');

$labelData = (new \JacobDeKeizer\Statusweb\Resources\LabelData())
    ->setLabelFormat(\JacobDeKeizer\Statusweb\Enums\LabelFormat::PDF)
    ->setReturnLabel(true); // return the pdf label in the response

$shipmentRow = (new \JacobDeKeizer\Statusweb\Resources\ShipmentRow())
    ->setAmount(1)
    ->setWeight(10)
    ->setUnit(\JacobDeKeizer\Statusweb\Enums\Unit::COLLI);

$shipment = (new \JacobDeKeizer\Statusweb\Resources\Shipment())
    ->setReference('My reference')
    ->setDeliveryAddress($deliveryAddress)
    ->setType(1) // Statusweb -> Tabellen -> Zendingsoorten
    ->setDirectSend(true) // when true the shipment is confirmed and can't be deleted
    ->setLabelData($labelData)
    ->addShipmentRow($shipmentRow); // ->setShipmentRows accepts an array of ShipmentRows

$shipmentResponse = $client->shipments()->create($shipment);

// Show label pdf
$data = base64_decode($shipmentResponse->getLabels());
header('Content-Type: application/pdf');
echo $data;
```

### Delete shipment

```php
$deleteShipmentResponse = $client->shipments()->delete(12345678); // transportNumber
```

### Send shipments
> Sends all shipments where setDirectSend was false
```php
$sendShipmentsResponse = $client->shipments()->send();
```

### Get shipment status
> This endpoint does only work if the shipment is in transport or has arrived.
```php
$statusResponse = $client->shipments()->getStatus(12345678); // transportNumber
$statusResponse->getStatuses();
```

### All shipment statuses
> This endpoint does only work if the are any shipments in transport or that have arrived.
```php
$statusResponse = $client->shipments()->getAllStatuses();
$statusResponse->getStatuses();
```

### Get statusweb status url
> Get the statusweb status url -> does only work when the shipment is in transport or has arrived
```php
$statusLink = $client->shipments()->getStatusUrl(12345678); // transportNumber
```

### Get estimated time of arrival
> This endpoint does only work if the shipment is in transport or has arrived.
```php
$etaResponse = $client->shipments()->getEstimatedTimeOfArrival(12345678); // transportNumber
```

### Get label
> This endpoint does only work if the shipment isn't confirmed by the send endpoint and directSend for the shipment was false
```php
$labelResponse = $client->labels()->get(9207289743, \JacobDeKeizer\Statusweb\Enums\LabelFormat::PDF);
```

### Exceptions

Each endpoint can throw a `StatuswebErrorResponse` or `StatuswebException`.
The `StatuswebErrorResponse` contains the error code and message from statusweb.
For example:
```php
try {
    $statusLink = $client->shipments()->getStatusUrl(12345678);
} catch (\JacobDeKeizer\Statusweb\Exceptions\StatuswebErrorResponse $statuswebErrorResponse) {
    $hasLink = $statuswebErrorResponse->getCode() === \JacobDeKeizer\Statusweb\Enums\ResponseCode::NO_STATUS_URL_FOR_SHIPMENT;
} catch (\JacobDeKeizer\Statusweb\Exceptions\StatuswebException $statuswebException) {
    $originalException = $statuswebException->getPrevious(); // do something
}
```

## Register your own session store implementation (Optional)

Statusweb session ids are valid for 2 hours.
To reduce the amount of sessionId requests you can create your own SessionStore.
By default the `JacobDeKeizer\Statusweb\Stores\DefaultSessionStore` is used.

```php
use JacobDeKeizer\Statusweb\Contracts\SessionStore;
use JacobDeKeizer\Statusweb\Dto\Session;

class DatabaseSessionStore implements SessionStore
{
    public function put(string $apiKey, Session $session): void
    {
        // save in db
    }

    public function get(string $apiKey): ?Session
    {
        // retrieve from db
    }
}
```

```php
$client->setSessionStore(new DatabaseSessionStore());
```

