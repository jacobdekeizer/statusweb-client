<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 9-2-2018
 * Time: 18:50
 */

namespace jacobdekeizer\Entities;


class ETAResponse extends BaseModel
{
    protected $attributes = [
        'Errorcode',
        'Errorstring',
        'ETA_Van',
        'ETA_Tot',
    ];
}