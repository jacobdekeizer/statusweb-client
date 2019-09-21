<?php

namespace jacobdekeizer\Entities;

class LabelResponse extends BaseModel
{
    protected $attributes = [
        'Vrachtnummer',
        'Kenmerk',
        'Labels',
        'ErrorCode',
        'ErrorString',
    ];
}