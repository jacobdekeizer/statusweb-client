<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class PodResponse implements Response
{
    public function __construct(
        private int $shipmentNumber,
        private ?string $reference = null,
        private ?string $pod = null,
        private ?int $podLength = null,
        private ?string $locX = null,
        private ?string $locY = null,
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

    public function setPod(?string $pod): static
    {
        $this->pod = $pod;
        return $this;
    }

    public function getPod(): ?string
    {
        return $this->pod;
    }

    public function setPodLength(?int $podLength): static
    {
        $this->podLength = $podLength;
        return $this;
    }

    public function getPodLength(): ?int
    {
        return $this->podLength;
    }

    public function setLocX(?string $locX): static
    {
        $this->locX = $locX;
        return $this;
    }

    public function getLocX(): ?string
    {
        return $this->locX;
    }

    public function setLocY(?string $locY): static
    {
        $this->locY = $locY;
        return $this;
    }

    public function getLocY(): ?string
    {
        return $this->locY;
    }

    public static function fromResponse(array $response): static
    {
        return new static(
            shipmentNumber: (int) ($response['Zendingnummer'] ?? 0),
            reference: $response['Kenmerk'] ?? null,
            pod: $response['POD'] ?? null,
            podLength: isset($response['PODLengte']) ? (int) $response['PODLengte'] : null,
            locX: $response['LocX'] ?? null,
            locY: $response['LocY'] ?? null,
        );
    }
}
