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