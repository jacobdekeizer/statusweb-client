<?php

namespace jacobdekeizer\Entities;

class DeleteShipmentResponse extends BaseModel
{
    protected $attributes = [
        'Vrachtnummer',
        'Kenmerk',
        'Errorcode',
        'Errorstring'
    ];
}