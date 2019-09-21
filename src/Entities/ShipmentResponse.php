<?php

namespace jacobdekeizer\Entities;

class ShipmentResponse extends BaseModel
{
    protected $attributes = [
        'Vrachtnummer',
        'Kenmerk',
        'Labels',
        'Errorcode',
        'Errorstring',
    ];
}