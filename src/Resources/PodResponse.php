<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class PodResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;
    private ?string $pod;
    private ?int $podLength;
    private ?string $locX;
    private ?string $locY;

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
        return (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null)
            ->setPod($response['POD'] ?? null)
            ->setPodLength(isset($response['PODLengte']) ? (int) $response['PODLengte'] : null)
            ->setLocX($response['LocX'] ?? null)
            ->setLocY($response['LocY'] ?? null);
    }
}
