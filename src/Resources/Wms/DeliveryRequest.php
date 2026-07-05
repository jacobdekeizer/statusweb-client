<?php

namespace JacobDeKeizer\Statusweb\Resources\Wms;

use JacobDeKeizer\Statusweb\Contracts\Request;
use JacobDeKeizer\Statusweb\Resources\Address;

class DeliveryRequest implements Request
{
    /**
     * @param ArticleData[] $articles
     */
    public function __construct(
        private Address $deliveryAddress,
        private int $shipmentType,
        private array $articles = [],
        private ?string $deliveryNote = null,
        private ?string $deliveryDate = null,
        private ?string $deliveryTimeFrom = null,
        private ?string $deliveryTimeUntil = null,
        private bool $directSend = false,
        private ?string $reference = null,
        private ?int $cashOnDeliveryAmount = null,
    ) {
    }

    public function setDeliveryAddress(Address $deliveryAddress): static
    {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function getDeliveryAddress(): Address
    {
        return $this->deliveryAddress;
    }

    public function addArticle(ArticleData $article): static
    {
        $this->articles[] = $article;
        return $this;
    }

    /**
     * @param ArticleData[] $articles
     */
    public function setArticles(array $articles): static
    {
        $this->articles = $articles;
        return $this;
    }

    /** @return ArticleData[] */
    public function getArticles(): array
    {
        return $this->articles;
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

    public function setDirectSend(bool $directSend): static
    {
        $this->directSend = $directSend;
        return $this;
    }

    public function isDirectSend(): bool
    {
        return $this->directSend;
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

    public function setCashOnDeliveryAmount(?int $cashOnDeliveryAmount): static
    {
        $this->cashOnDeliveryAmount = $cashOnDeliveryAmount;
        return $this;
    }

    public function getCashOnDeliveryAmount(): ?int
    {
        return $this->cashOnDeliveryAmount;
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

    public function toRequest(): array
    {
        return [
            'Losadres' => $this->deliveryAddress->toRequest(),
            'Artikels' => [
                'ArtikelData' => array_map(static fn(ArticleData $a) => $a->toRequest(), $this->articles),
            ],
            'Losopmerking' => $this->deliveryNote,
            'Losdatum' => $this->deliveryDate,
            'Losvanaf' => $this->deliveryTimeFrom,
            'Lostotmet' => $this->deliveryTimeUntil,
            'DirectSend' => $this->directSend ? 1 : 0,
            'Kenmerk' => $this->reference,
            'Rembours' => $this->cashOnDeliveryAmount,
            'Zendingsoort' => $this->shipmentType,
        ];
    }
}
