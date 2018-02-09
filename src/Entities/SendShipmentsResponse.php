<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 9-2-2018
 * Time: 17:19
 */

namespace jacobdekeizer\Entities;


class SendShipmentsResponse extends BaseModel
{
    protected $attributes = [
        'Zendingen',
        'ErrorCode',
        'ErrorString',
    ];
}