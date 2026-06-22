<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Request;

class ShipmentRow implements Request
{
    private int $amount;
    private string $unit;
    private int $weight;
    private ?string $description = null;
    private ?string $articleNumber = null;
    private ?int $length = null;
    private ?int $width = null;
    private ?int $height = null;
    private ?int $volume = null;
    private ?int $loadMeters = null;
    /** @var BarcodeData[] */
    private array $barcodes = [];
    private ?AdrData $adr = null;

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setUnit(string $unit): static
    {
        $this->unit = $unit;
        return $this;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setWeight(int $weight): static
    {
        $this->weight = $weight;
        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setArticleNumber(?string $articleNumber): static
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    public function setLength(?int $length): static
    {
        $this->length = $length;
        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setWidth(?int $width): static
    {
        $this->width = $width;
        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setHeight(?int $height): static
    {
        $this->height = $height;
        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setVolume(?int $volume): static
    {
        $this->volume = $volume;
        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setLoadMeters(?int $loadMeters): static
    {
        $this->loadMeters = $loadMeters;
        return $this;
    }

    public function getLoadMeters(): ?int
    {
        return $this->loadMeters;
    }

    /**
     * @param BarcodeData[] $barcodes
     */
    public function setBarcodes(array $barcodes): static
    {
        $this->barcodes = $barcodes;
        return $this;
    }

    /** @return BarcodeData[] */
    public function getBarcodes(): array
    {
        return $this->barcodes;
    }

    public function addBarcode(BarcodeData $barcode): static
    {
        $this->barcodes[] = $barcode;
        return $this;
    }

    public function setAdr(?AdrData $adr): static
    {
        $this->adr = $adr;
        return $this;
    }

    public function getAdr(): ?AdrData
    {
        return $this->adr;
    }

    public function toRequest(): array
    {
        $barcodes = array_map(static fn(BarcodeData $b) => $b->toRequest(), $this->barcodes);

        return [
            'Aantal' => $this->getAmount(),
            'Eenheid' => $this->getUnit(),
            'Gewicht' => $this->getWeight(),
            'Omschrijving' => $this->getDescription(),
            'Artikelnr' => $this->getArticleNumber(),
            'Lengte' => $this->getLength(),
            'Breedte' => $this->getWidth(),
            'Hoogte' => $this->getHeight(),
            'Volume' => $this->getVolume(),
            'Laadmeters' => $this->getLoadMeters(),
            'Barcodes' => $barcodes ? ['BarcodeData' => $barcodes] : null,
            'ADR' => $this->adr?->toRequest(),
        ];
    }
}
