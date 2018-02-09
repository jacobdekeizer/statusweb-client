<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 9-12-2017
 * Time: 16:08
 */

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