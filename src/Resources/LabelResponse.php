<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class LabelResponse implements Response
{
    /**
     * @param string[] $barcodes
     */
    public function __construct(
        private int $shipmentNumber,
        private ?string $reference = null,
        private ?string $labels = null,
        private ?int $labelLength = null,
        private array $barcodes = [],
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

    public function setLabels(?string $labels): static
    {
        $this->labels = $labels;
        return $this;
    }

    public function getLabels(): ?string
    {
        return $this->labels;
    }

    public function setLabelLength(?int $labelLength): static
    {
        $this->labelLength = $labelLength;
        return $this;
    }

    public function getLabelLength(): ?int
    {
        return $this->labelLength;
    }

    /**
     * @param string[] $barcodes
     */
    public function setBarcodes(array $barcodes): static
    {
        $this->barcodes = $barcodes;
        return $this;
    }

    /** @return string[] */
    public function getBarcodes(): array
    {
        return $this->barcodes;
    }

    public static function fromResponse(array $response): static
    {
        return new static(
            shipmentNumber: (int) ($response['Zendingnummer'] ?? 0),
            reference: $response['Kenmerk'] ?? null,
            labels: $response['Labels'] ?? null,
            labelLength: isset($response['LabelLengte']) ? (int) $response['LabelLengte'] : null,
            barcodes: self::extractBarcodes($response),
        );
    }

    private static function extractBarcodes(array $response): array
    {
        if (!isset($response['Barcodes']['BarcodeData'])) {
            return [];
        }
        $data = $response['Barcodes']['BarcodeData'];
        if (isset($data['Barcode'])) {
            return [$data['Barcode']];
        }
        return array_column($data, 'Barcode');
    }
}
