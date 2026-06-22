<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusweblinkResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;
    private string $statuswebLink;

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

    public function setStatuswebLink(string $statuswebLink): static
    {
        $this->statuswebLink = $statuswebLink;
        return $this;
    }

    public function getStatuswebLink(): string
    {
        return $this->statuswebLink;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null)
            ->setStatuswebLink($response['Statusweblink'] ?? '');
    }
}
