<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class EtaResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;
    private string $from;
    private string $until;

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

    public function setFrom(string $from): static
    {
        $this->from = $from;
        return $this;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setUntil(string $until): static
    {
        $this->until = $until;
        return $this;
    }

    public function getUntil(): string
    {
        return $this->until;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null)
            ->setFrom($response['ETA_Van'] ?? '')
            ->setUntil($response['ETA_Tot'] ?? '');
    }
}
