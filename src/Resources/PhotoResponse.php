<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class PhotoResponse implements Response
{
    /**
     * @param PhotoData[] $photos
     */
    public function __construct(
        private int $shipmentNumber,
        private ?string $reference = null,
        private array $photos = [],
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

    /**
     * @param PhotoData[] $photos
     */
    public function setPhotos(array $photos): static
    {
        $this->photos = $photos;
        return $this;
    }

    /** @return PhotoData[] */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    public static function fromResponse(array $response): static
    {
        $photos = [];
        if (isset($response['Fotos']['FotoData'])) {
            $data = $response['Fotos']['FotoData'];
            if (isset($data['Bestandsnaam'])) {
                $data = [$data];
            }
            $photos = array_map(static fn(array $f) => PhotoData::fromResponse($f), $data);
        }

        return new static(
            shipmentNumber: (int) ($response['Zendingnummer'] ?? 0),
            reference: $response['Kenmerk'] ?? null,
            photos: $photos,
        );
    }
}
