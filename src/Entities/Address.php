<?php

namespace jacobdekeizer\Entities;

class Address extends BaseModel
{
    protected $attributes = [
        'Naam',
        'Adres',
        'Huisnr',
        'Postcode',
        'Plaats',
        'Landcode',
        'Telnr',
        'Email'
    ];
}