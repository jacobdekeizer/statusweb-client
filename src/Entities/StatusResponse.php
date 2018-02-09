<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 9-2-2018
 * Time: 18:29
 */

namespace jacobdekeizer\Entities;


class StatusResponse extends BaseModel
{
    protected $attributes = [
        'Status',
        'Mark',
        'More',
        'Errorcode',
        'Errorstring'
    ];
}