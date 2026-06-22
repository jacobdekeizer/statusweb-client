<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class StatusDataResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;
    private string $date;
    private string $time;
    private int $statusNumber;
    private string $statusDescription;
    private ?string $note;
    private int $uid;

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

    public function setDate(string $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setTime(string $time): static
    {
        $this->time = $time;
        return $this;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setStatusNumber(int $statusNumber): static
    {
        $this->statusNumber = $statusNumber;
        return $this;
    }

    public function getStatusNumber(): int
    {
        return $this->statusNumber;
    }

    public function setStatusDescription(string $statusDescription): static
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    public function getStatusDescription(): string
    {
        return $this->statusDescription;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;
        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setUid(int $uid): static
    {
        $this->uid = $uid;
        return $this;
    }

    public function getUid(): int
    {
        return $this->uid;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null)
            ->setDate($response['Datum'] ?? '')
            ->setTime($response['Tijd'] ?? '')
            ->setStatusNumber((int) ($response['StatusNummer'] ?? 0))
            ->setStatusDescription($response['StatusOmschrijving'] ?? '')
            ->setNote($response['Opmerking'] ?? null)
            ->setUid((int) ($response['UID'] ?? 0));
    }
}
