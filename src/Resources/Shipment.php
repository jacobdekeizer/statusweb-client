<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class Shipment implements Request
{
    /**
     * @var Address
     */
    private $loadingAddress;

    /**
     * @var Address
     */
    private $deliveryAddress;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string|null
     */
    private $loadingDate;

    /**
     * @var string|null
     */
    private $loadingTimeFrom;

    /**
     * @var string|null
     */
    private $loadingTimeUntil;

    /**
     * @var string|null
     */
    private $loadingNote;

    /**
     * @var string|null
     */
    private $deliveryDate;

    /**
     * @var string|null
     */
    private $deliveryTimeFrom;

    /**
     * @var string|null
     */
    private $deliveryTimeUntil;

    /**
     * @var string|null
     */
    private $deliveryNote;

    /**
     * @var int|null
     */
    private $cashOnDeliveryAmount;

    /**
     * @var bool
     */
    private $directSend;

    /**
     * @var ShipmentRow[]
     */
    private $shipmentRows;

    /**
     * @var LabelData
     */
    private $labelData;

    /**
     * @param Address $loadingAddress
     * @return Shipment
     */
    public function setLoadingAddress(Address $loadingAddress): Shipment
    {
        $this->loadingAddress = $loadingAddress;
        return $this;
    }

    /**
     * @return Address
     */
    public function getLoadingAddress(): Address
    {
        return $this->loadingAddress;
    }

    /**
     * @param Address $deliveryAddress
     * @return Shipment
     */
    public function setDeliveryAddress(Address $deliveryAddress): Shipment
    {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress(): Address
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string|null $reference
     * @return Shipment
     */
    public function setReference(?string $reference): Shipment
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param int $type
     * @return Shipment
     */
    public function setType(int $type): Shipment
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param string|null $loadingDate
     * @return Shipment
     */
    public function setLoadingDate(?string $loadingDate): Shipment
    {
        $this->loadingDate = $loadingDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLoadingDate(): ?string
    {
        return $this->loadingDate;
    }

    /**
     * @param string|null $loadingTimeFrom
     * @return Shipment
     */
    public function setLoadingTimeFrom(?string $loadingTimeFrom): Shipment
    {
        $this->loadingTimeFrom = $loadingTimeFrom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLoadingTimeFrom(): ?string
    {
        return $this->loadingTimeFrom;
    }

    /**
     * @param string|null $loadingTimeUntil
     * @return Shipment
     */
    public function setLoadingTimeUntil(?string $loadingTimeUntil): Shipment
    {
        $this->loadingTimeUntil = $loadingTimeUntil;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLoadingTimeUntil(): ?string
    {
        return $this->loadingTimeUntil;
    }

    /**
     * @param string|null $loadingNote
     * @return Shipment
     */
    public function setLoadingNote(?string $loadingNote): Shipment
    {
        $this->loadingNote = $loadingNote;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLoadingNote(): ?string
    {
        return $this->loadingNote;
    }

    /**
     * @param string|null $deliveryDate
     * @return Shipment
     */
    public function setDeliveryDate(?string $deliveryDate): Shipment
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    /**
     * @param string|null $deliveryTimeFrom
     * @return Shipment
     */
    public function setDeliveryTimeFrom(?string $deliveryTimeFrom): Shipment
    {
        $this->deliveryTimeFrom = $deliveryTimeFrom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeFrom(): ?string
    {
        return $this->deliveryTimeFrom;
    }

    /**
     * @param string|null $deliveryTimeUntil
     * @return Shipment
     */
    public function setDeliveryTimeUntil(?string $deliveryTimeUntil): Shipment
    {
        $this->deliveryTimeUntil = $deliveryTimeUntil;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeUntil(): ?string
    {
        return $this->deliveryTimeUntil;
    }

    /**
     * @param string|null $deliveryNote
     * @return Shipment
     */
    public function setDeliveryNote(?string $deliveryNote): Shipment
    {
        $this->deliveryNote = $deliveryNote;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryNote(): ?string
    {
        return $this->deliveryNote;
    }

    /**
     * @param int|null $cashOnDeliveryAmount
     * @return Shipment
     */
    public function setCashOnDeliveryAmount(?int $cashOnDeliveryAmount): Shipment
    {
        $this->cashOnDeliveryAmount = $cashOnDeliveryAmount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCashOnDeliveryAmount(): ?int
    {
        return $this->cashOnDeliveryAmount;
    }

    /**
     * @param bool $directSend
     * @return Shipment
     */
    public function setDirectSend(bool $directSend): Shipment
    {
        $this->directSend = $directSend;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDirectSend(): bool
    {
        return $this->directSend;
    }

    /**
     * @param ShipmentRow[] $shipmentRows
     * @return Shipment
     */
    public function setShipmentRows(array $shipmentRows): Shipment
    {
        $this->shipmentRows = $shipmentRows;
        return $this;
    }

    /**
     * @param ShipmentRow $shipmentRow
     * @return Shipment
     */
    public function addShipmentRow(ShipmentRow $shipmentRow): Shipment
    {
        if ($this->shipmentRows === null) {
            $this->shipmentRows = [];
        }

        $this->shipmentRows[] = $shipmentRow;
        return $this;
    }

    /**
     * @return ShipmentRow[]
     */
    public function getShipmentRows(): array
    {
        return $this->shipmentRows;
    }

    /**
     * @param LabelData $labelData
     * @return Shipment
     */
    public function setLabelData(LabelData $labelData): Shipment
    {
        $this->labelData = $labelData;
        return $this;
    }

    /**
     * @return LabelData
     */
    public function getLabelData(): LabelData
    {
        return $this->labelData;
    }

    /**
     * @inheritDoc
     */
    public function toRequest(): array
    {
        return [
            'Zending' => [
                'Laadadres' => $this->loadingAddress->toRequest(),
                'Losadres' => $this->deliveryAddress->toRequest(),
                'Kenmerk' => $this->getReference(),
                'Zendingsoort' => $this->getType(),
                'Laaddatum' => $this->getLoadingDate(),
                'Laadvanaf' => $this->getLoadingTimeFrom(),
                'Laadtotmet' => $this->getLoadingTimeUntil(),
                'Laadopmerking' => $this->getLoadingNote(),
                'Losdatum' => $this->getDeliveryDate(),
                'Losvanaf' => $this->getDeliveryTimeFrom(),
                'Lostotmet' => $this->getDeliveryTimeUntil(),
                'Losopmerking' => $this->getDeliveryNote(),
                'Zendingregels' => [
                    'ZendingregelData' => array_map(static function (ShipmentRow $shipmentRow): array {
                        return $shipmentRow->toRequest();
                    }, $this->getShipmentRows()),
                ],
                'Rembours' => $this->getCashOnDeliveryAmount(),
                'Labeldefinitie' => $this->getLabelData()->toRequest(),
                'DirectSend' => $this->isDirectSend() ? 1 : 0,
            ],
        ];
    }
}