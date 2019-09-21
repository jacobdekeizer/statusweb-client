<?php

namespace jacobdekeizer\Entities;

class Shipment extends BaseModel
{
    protected $attributes = [
        'Kenmerk',
        'Zendingsoort',
        'Losdatum',
        'Losopmerking',
        'Laaddatum',
        'Laadopmerking',
        'Rembours',
    ];
}