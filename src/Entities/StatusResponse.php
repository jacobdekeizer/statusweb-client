<?php

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