<?php

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