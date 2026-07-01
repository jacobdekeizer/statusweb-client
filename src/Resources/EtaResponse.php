<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class EtaResponse implements Response
{
    public function __construct(
        private int $shipmentNumber,
        private string $from,
        private string $until,
        private ?string $reference = null,
    ) {
    }

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
        return new static(
            shipmentNumber: (int) ($response['Zendingnummer'] ?? 0),
            from: $response['ETA_Van'] ?? '',
            until: $response['ETA_Tot'] ?? '',
            reference: $response['Kenmerk'] ?? null,
        );
    }
}
