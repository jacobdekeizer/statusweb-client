<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1-12-2017
 * Time: 19:41
 */

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