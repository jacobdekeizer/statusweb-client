<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class ShipmentRow implements Request
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $unit;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $articleNumber;

    /**
     * @var int|null
     */
    private $length;

    /**
     * @var int|null
     */
    private $width;

    /**
     * @var int|null
     */
    private $height;

    /**
     * @var int|null
     */
    private $volume;

    /**
     * @var int|null
     */
    private $loadMeters;

    /**
     * @param int $amount
     * @return ShipmentRow
     */
    public function setAmount(int $amount): ShipmentRow
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param string $unit
     * @return ShipmentRow
     */
    public function setUnit(string $unit): ShipmentRow
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param int $weight
     * @return ShipmentRow
     */
    public function setWeight(int $weight): ShipmentRow
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param string|null $description
     * @return ShipmentRow
     */
    public function setDescription(?string $description): ShipmentRow
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $articleNumber
     * @return ShipmentRow
     */
    public function setArticleNumber(?string $articleNumber): ShipmentRow
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    /**
     * @param int|null $length
     * @return ShipmentRow
     */
    public function setLength(?int $length): ShipmentRow
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * @param int|null $width
     * @return ShipmentRow
     */
    public function setWidth(?int $width): ShipmentRow
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $height
     * @return ShipmentRow
     */
    public function setHeight(?int $height): ShipmentRow
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $volume
     * @return ShipmentRow
     */
    public function setVolume(?int $volume): ShipmentRow
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVolume(): ?int
    {
        return $this->volume;
    }

    /**
     * @param int|null $loadMeters
     * @return ShipmentRow
     */
    public function setLoadMeters(?int $loadMeters): ShipmentRow
    {
        $this->loadMeters = $loadMeters;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLoadMeters(): ?int
    {
        return $this->loadMeters;
    }

    /**
     * @inheritDoc
     */
    public function toRequest(): array
    {
        return [
            'Aantal' => $this->getAmount(),
            'Eenheid' => $this->getUnit(),
            'Gewicht' => $this->getWeight(),
            'Omschrijving' => $this->getWeight(),
            'Artikelnr' => $this->getArticleNumber(),
            'Lengte' => $this->getLength(),
            'Breedte' => $this->getWidth(),
            'Hoogte' => $this->getHeight(),
            'Volume' => $this->getVolume(),
            'Laadmeters' => $this->getLoadMeters(),
        ];
    }
}