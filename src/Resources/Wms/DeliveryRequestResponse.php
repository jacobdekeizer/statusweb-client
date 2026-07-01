<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Response;

class DeliveryRequestResponse implements Response
{
    public function __construct(
        private int $deliveryId,
    ) {
    }

    public function setDeliveryId(int $deliveryId): static
    {
        $this->deliveryId = $deliveryId;
        return $this;
    }

    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    public static function fromResponse(array $response): static
    {
        return new static(
            deliveryId: (int) ($response['UitslagID'] ?? 0),
        );
    }
}
