<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class ShipmentTypeTableItem implements Response
{
    public function __construct(
        private int $shipmentType,
        private string $description,
    ) {
    }

    public function setShipmentType(int $shipmentType): static
    {
        $this->shipmentType = $shipmentType;
        return $this;
    }

    public function getShipmentType(): int
    {
        return $this->shipmentType;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public static function fromResponse(array $response): static
    {
        return new static(
            shipmentType: (int) ($response['Zendingsoort'] ?? 0),
            description: $response['Omschrijving'] ?? '',
        );
    }

    public static function collectionFromResponse(array $items): array
    {
        if (isset($items['Zendingsoort'])) {
            $items = [$items];
        }
        return array_map(static fn(array $item) => static::fromResponse($item), $items);
    }
}
