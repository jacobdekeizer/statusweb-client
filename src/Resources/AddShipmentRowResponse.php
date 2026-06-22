<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class AddShipmentRowResponse implements Response
{
    private int $shipmentNumber;
    private ?string $reference;
    private ?string $labels;
    private ?int $labelLength;
    private ?string $statuswebLink;
    private array $barcodes;
    private array $rowIds;

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

    public function setStatuswebLink(?string $statuswebLink): static
    {
        $this->statuswebLink = $statuswebLink;
        return $this;
    }

    public function getStatuswebLink(): ?string
    {
        return $this->statuswebLink;
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

    /**
     * @param int[] $rowIds
     */
    public function setRowIds(array $rowIds): static
    {
        $this->rowIds = $rowIds;
        return $this;
    }

    /** @return int[] */
    public function getRowIds(): array
    {
        return $this->rowIds;
    }

    public static function fromResponse(array $response): static
    {
        return (new static)
            ->setShipmentNumber((int) ($response['Zendingnummer'] ?? 0))
            ->setReference($response['Kenmerk'] ?? null)
            ->setLabels($response['Labels'] ?? null)
            ->setLabelLength(isset($response['LabelLengte']) ? (int) $response['LabelLengte'] : null)
            ->setStatuswebLink($response['StatuswebLink'] ?? null)
            ->setBarcodes(self::extractBarcodes($response))
            ->setRowIds(self::extractIds($response['Regel_IDs'] ?? null));
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

    private static function extractIds(mixed $ids): array
    {
        if ($ids === null || !is_array($ids)) {
            return [];
        }
        return array_values(array_filter($ids, 'is_numeric'));
    }
}
