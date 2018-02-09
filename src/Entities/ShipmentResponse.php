<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 9-12-2017
 * Time: 16:01
 */

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