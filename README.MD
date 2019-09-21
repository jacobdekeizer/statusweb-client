# Statusweb api client

For example usage of this package see the example.php file.
The login credentials can be requested from your transporter.  

# Installation

Get it with composer

```
composer require jacobdekeizer/statusweb-client
```

Autoload package with composer autoloader
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use jacobdekeizer\StatuswebClient;

$transportNumber = null;
$customerNumber = null;
$password = null;

$client = new StatuswebClient($transportNumber, $customerNumber, $password);
```

If installed without composer use the provided autoloader

```php
require __DIR__ . '/src/AutoLoader.php';
```

# Example usage

```php 

<?php

require __DIR__ . '/src/AutoLoader.php';

use jacobdekeizer\Entities\LabelData;
use jacobdekeizer\Entities\ShipmentRow;
use jacobdekeizer\StatuswebClient;
use jacobdekeizer\Entities\Address;
use jacobdekeizer\Entities\Shipment;

$transportNumber = null;
$customerNumber = null;
$password = null;

$client = new StatuswebClient($transportNumber, $customerNumber, $password);

//shipmentaddress
$address = new Address(
    [
        'Naam' => 'NAME_HERE',
        'Adres' => 'ADRESS_HERE',
        'Huisnr' => 'HOUSENUMBER_HERE',
        'Postcode' => 'POSTAL_CODE_HERE',
        'Plaats' => 'PLACE',
        'Landcode' => '31', //countrynumber
    ]
);

//shipmentdetails
$shipment = new Shipment(
    [
        'Zendingsoort' => 1,
        'Kenmerk' => 'test'
    ]
);

//items to be shipped
$shipmentRows = [
    new ShipmentRow(
        [
            'Aantal' => 1,
            'Eenheid' => 'COLLI',
            'Gewicht' => 2
        ]
    ),
    new ShipmentRow(
        [
            'Aantal' => 1,
            'Eenheid' => 'COLLI',
            'Gewicht' => 2
        ]
    )
];

$label = new LabelData([
    'LabelJN' => 1,
    'LabelFormaat' => 0
]);

$shipmentResponse = $client->createShipment($shipment, $address, $shipmentRows, $label);
var_dump($shipmentResponse->getData());

/*
 *  Print label pdf
$data = base64_decode($shipmentResponse->Labels);
header('Content-Type: application/pdf');
echo $data;
*/


$shipmentResponse = $client->sendShipments();
var_dump($shipmentResponse->getData());

$labelResponse = $client->getLabel($shipmentResponse->Vrachtnummer);
var_dump($labelResponse->getData(0));


$statusesResponse = $client->getStatuses();
var_dump($statusesResponse->getData());

$statusResponse = $client->getStatus($shipmentResponse->Vrachtnummer);
var_dump($statusResponse->getData());

$statusResponse = $client->getETA($shipmentResponse->Vrachtnummer);
var_dump($statusResponse->getData());

```