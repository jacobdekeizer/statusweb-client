<?php

namespace JacobDeKeizer\Statusweb\Resources;

use JacobDeKeizer\Statusweb\Contracts\Response;

class PhotoData implements Response
{
    public function __construct(
        private string $filename,
        private ?string $photo = null,
        private ?int $photoLength = null,
        private ?string $locX = null,
        private ?string $locY = null,
    ) {
    }

    public function setFilename(string $filename): static
    {
        $this->filename = $filename;
        return $this;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhotoLength(?int $photoLength): static
    {
        $this->photoLength = $photoLength;
        return $this;
    }

    public function getPhotoLength(): ?int
    {
        return $this->photoLength;
    }

    public function setLocX(?string $locX): static
    {
        $this->locX = $locX;
        return $this;
    }

    public function getLocX(): ?string
    {
        return $this->locX;
    }

    public function setLocY(?string $locY): static
    {
        $this->locY = $locY;
        return $this;
    }

    public function getLocY(): ?string
    {
        return $this->locY;
    }

    public static function fromResponse(array $response): static
    {
        return new static(
            filename: $response['Bestandsnaam'] ?? '',
            photo: $response['Foto'] ?? null,
            photoLength: isset($response['FotoLengte']) ? (int) $response['FotoLengte'] : null,
            locX: $response['LocX'] ?? null,
            locY: $response['LocY'] ?? null,
        );
    }
}
