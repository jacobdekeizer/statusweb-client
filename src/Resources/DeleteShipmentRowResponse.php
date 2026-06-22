<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class DeleteShipmentRowResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;

    public function setShipmentNumber(int $shipmentNumber): static
    {
        $this->shipmentNumber = $shipmentNumber;
        return $this;
    }

    public function getShipmentNumber(): int
    {
        return $this->shipmentNumber;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;
        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null);
    }
}
