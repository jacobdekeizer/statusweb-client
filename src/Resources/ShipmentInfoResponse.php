<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class ShipmentInfoResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;
    private int $shipmentType;
    private ?Address $loadingAddress;
    private ?string $loadingDate;
    private ?string $loadingTimeFrom;
    private ?string $loadingTimeUntil;
    private ?string $loadingNote;
    private ?Address $deliveryAddress;
    private ?string $deliveryDate;
    private ?string $deliveryTimeFrom;
    private ?string $deliveryTimeUntil;
    private ?string $deliveryNote;
    private array $shipmentRows;
    private ?int $cashOnDeliveryAmount;

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

    public function setShipmentType(int $shipmentType): static
    {
        $this->shipmentType = $shipmentType;
        return $this;
    }

    public function getShipmentType(): int
    {
        return $this->shipmentType;
    }

    public function setLoadingAddress(?Address $loadingAddress): static
    {
        $this->loadingAddress = $loadingAddress;
        return $this;
    }

    public function getLoadingAddress(): ?Address
    {
        return $this->loadingAddress;
    }

    public function setLoadingDate(?string $loadingDate): static
    {
        $this->loadingDate = $loadingDate;
        return $this;
    }

    public function getLoadingDate(): ?string
    {
        return $this->loadingDate;
    }

    public function setLoadingTimeFrom(?string $loadingTimeFrom): static
    {
        $this->loadingTimeFrom = $loadingTimeFrom;
        return $this;
    }

    public function getLoadingTimeFrom(): ?string
    {
        return $this->loadingTimeFrom;
    }

    public function setLoadingTimeUntil(?string $loadingTimeUntil): static
    {
        $this->loadingTimeUntil = $loadingTimeUntil;
        return $this;
    }

    public function getLoadingTimeUntil(): ?string
    {
        return $this->loadingTimeUntil;
    }

    public function setLoadingNote(?string $loadingNote): static
    {
        $this->loadingNote = $loadingNote;
        return $this;
    }

    public function getLoadingNote(): ?string
    {
        return $this->loadingNote;
    }

    public function setDeliveryAddress(?Address $deliveryAddress): static
    {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function getDeliveryAddress(): ?Address
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryDate(?string $deliveryDate): static
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    public function setDeliveryTimeFrom(?string $deliveryTimeFrom): static
    {
        $this->deliveryTimeFrom = $deliveryTimeFrom;
        return $this;
    }

    public function getDeliveryTimeFrom(): ?string
    {
        return $this->deliveryTimeFrom;
    }

    public function setDeliveryTimeUntil(?string $deliveryTimeUntil): static
    {
        $this->deliveryTimeUntil = $deliveryTimeUntil;
        return $this;
    }

    public function getDeliveryTimeUntil(): ?string
    {
        return $this->deliveryTimeUntil;
    }

    public function setDeliveryNote(?string $deliveryNote): static
    {
        $this->deliveryNote = $deliveryNote;
        return $this;
    }

    public function getDeliveryNote(): ?string
    {
        return $this->deliveryNote;
    }

    /**
     * @param array<int, array<string, mixed>> $shipmentRows
     */
    public function setShipmentRows(array $shipmentRows): static
    {
        $this->shipmentRows = $shipmentRows;
        return $this;
    }

    /** @return array<int, array<string, mixed>> */
    public function getShipmentRows(): array
    {
        return $this->shipmentRows;
    }

    public function setCashOnDeliveryAmount(?int $cashOnDeliveryAmount): static
    {
        $this->cashOnDeliveryAmount = $cashOnDeliveryAmount;
        return $this;
    }

    public function getCashOnDeliveryAmount(): ?int
    {
        return $this->cashOnDeliveryAmount;
    }

    public static function fromResponse(array $response): static
    {
        $instance = (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null)
            ->setShipmentType((int) ($response['Zendingsoort'] ?? 0))
            ->setLoadingDate($response['Laaddatum'] ?? null)
            ->setLoadingTimeFrom($response['Laadvanaf'] ?? null)
            ->setLoadingTimeUntil($response['Laadtotmet'] ?? null)
            ->setLoadingNote($response['Laadopmerking'] ?? null)
            ->setDeliveryDate($response['Losdatum'] ?? null)
            ->setDeliveryTimeFrom($response['Losvanaf'] ?? null)
            ->setDeliveryTimeUntil($response['Lostotmet'] ?? null)
            ->setDeliveryNote($response['Losopmerking'] ?? null)
            ->setCashOnDeliveryAmount(isset($response['Rembours']) ? (int) $response['Rembours'] : null)
            ->setShipmentRows(self::extractRows($response));

        if (isset($response['Laadadres'])) {
            $instance->setLoadingAddress(self::parseAddress($response['Laadadres']));
        }

        if (isset($response['LosAdres'])) {
            $instance->setDeliveryAddress(self::parseAddress($response['LosAdres']));
        }

        return $instance;
    }

    private static function parseAddress(array $data): Address
    {
        return (new Address)
            ->setName($data['Naam'] ?? '')
            ->setToTheAttentionOf($data['Tav'] ?? null)
            ->setStreet($data['Adres'] ?? '')
            ->setHouseNumber($data['Huisnr'] ?? '')
            ->setPostalCode($data['Postcode'] ?? '')
            ->setCity($data['Plaats'] ?? '')
            ->setCountryCode((int) ($data['Landcode'] ?? 0))
            ->setPhoneNumber($data['Telnr'] ?? null)
            ->setEmail($data['Email'] ?? null);
    }

    private static function extractRows(array $response): array
    {
        if (!isset($response['Zendingregels']['ZendingregelData'])) {
            return [];
        }
        $data = $response['Zendingregels']['ZendingregelData'];
        if (isset($data['Aantal'])) {
            $data = [$data];
        }
        return $data;
    }
}
