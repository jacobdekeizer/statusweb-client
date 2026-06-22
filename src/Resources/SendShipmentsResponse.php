<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class SendShipmentsResponse implements Response
{
    /** @var SendShipmentResponse[] */
    private array $shipments;

    /**
     * @param SendShipmentResponse[] $shipments
     */
    public function setShipments(array $shipments): static
    {
        $this->shipments = $shipments;
        return $this;
    }

    /** @return SendShipmentResponse[] */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    public static function fromResponse(array $response): static
    {
        $zendingen = $response['Zendingen'] ?? [];

        $items = [];
        if (isset($zendingen['SendZendingData'])) {
            $data = $zendingen['SendZendingData'];
            // normalize single item (associative) vs multiple items (indexed)
            if (isset($data['Zendingnummer'])) {
                $data = [$data];
            }
            $items = array_map(
                static fn(array $item) => SendShipmentResponse::fromResponse($item),
                $data,
            );
        }

        return (new static)->setShipments($items);
    }
}
