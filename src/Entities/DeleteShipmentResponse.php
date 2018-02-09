<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 9-2-2018
 * Time: 18:21
 */

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