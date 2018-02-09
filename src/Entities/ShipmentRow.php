<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1-12-2017
 * Time: 19:41
 */

namespace jacobdekeizer\Entities;

class ShipmentRow extends BaseModel
{
    protected $attributes = [
        'Aantal',
        'Eenheid',
        'Gewicht',
        'Omschrijving',
        'Artikelnr',
    ];
}