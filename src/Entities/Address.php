<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1-12-2017
 * Time: 19:27
 */

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