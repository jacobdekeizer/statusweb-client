<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Response;

class DeleteDeliveryResponse implements Response
{
    public static function fromResponse(array $response): static
    {
        return new static;
    }
}
