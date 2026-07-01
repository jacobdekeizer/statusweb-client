<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class ShipmentInfoResponse implements Response
{
    /**
     * @param array<int, array<string, mixed>> $shipmentRows
     */
    public function __construct(
        private int $shipmentNumber,
        private int $shipmentType,
        private ?string $reference = null,
        private ?Address $loadingAddress = null,
        private ?string $loadingDate = null,
        private ?string $loadingTimeFrom = null,
        private ?string $loadingTimeUntil = null,
        private ?string $loadingNote = null,
        private ?Address $deliveryAddress = null,
        private ?string $deliveryDate = null,
        private ?string $deliveryTimeFrom = null,
        private ?string $deliveryTimeUntil = null,
        private ?string $deliveryNote = null,
        private ?int $cashOnDeliveryAmount = null,
        private array $shipmentRows = [],
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
        return new static(
            shipmentNumber: (int) ($response['Zendingnummer'] ?? 0),
            shipmentType: (int) ($response['Zendingsoort'] ?? 0),
            reference: $response['Kenmerk'] ?? null,
            loadingAddress: isset($response['Laadadres']) ? self::parseAddress($response['Laadadres']) : null,
            loadingDate: $response['Laaddatum'] ?? null,
            loadingTimeFrom: $response['Laadvanaf'] ?? null,
            loadingTimeUntil: $response['Laadtotmet'] ?? null,
            loadingNote: $response['Laadopmerking'] ?? null,
            deliveryAddress: isset($response['LosAdres']) ? self::parseAddress($response['LosAdres']) : null,
            deliveryDate: $response['Losdatum'] ?? null,
            deliveryTimeFrom: $response['Losvanaf'] ?? null,
            deliveryTimeUntil: $response['Lostotmet'] ?? null,
            deliveryNote: $response['Losopmerking'] ?? null,
            cashOnDeliveryAmount: isset($response['Rembours']) ? (int) $response['Rembours'] : null,
            shipmentRows: self::extractRows($response),
        );
    }

    private static function parseAddress(array $data): Address
    {
        return new Address(
            name: $data['Naam'] ?? '',
            street: $data['Adres'] ?? '',
            houseNumber: $data['Huisnr'] ?? '',
            postalCode: $data['Postcode'] ?? '',
            city: $data['Plaats'] ?? '',
            countryCode: (int) ($data['Landcode'] ?? 0),
            toTheAttentionOf: $data['Tav'] ?? null,
            phoneNumber: $data['Telnr'] ?? null,
            email: $data['Email'] ?? null,
        );
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
